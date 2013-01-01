<?php
/*
 *  $Id: hub.php 8 2011-04-03 17:58:53Z k42b3 $
 *
 * psx
 * A object oriented and modular based PHP framework for developing
 * dynamic web applications. For the current version and informations
 * visit <http://phpsx.org>
 *
 * Copyright (c) 2011 Christoph Kappestein <k42b3.x@gmail.com>
 *
 * This file is part of psx. psx is free software: you can
 * redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or any later version.
 *
 * psx is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with psx. If not, see <http://www.gnu.org/licenses/>.
 */

namespace pubsubhubbub;

use PSX_ModuleAbstract;
use PSX_Validate;
use PSX_Post;
use PSX_Filter_Length;
use PSX_Filter_Url;
use PSX_Filter_InArray;
use PSX_Url;
use PSX_Http;
use PSX_Http_GetRequest;
use PSX_Exception;
use PSX_Atom;
use PSX_Rss;

/**
 * hub
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    PubSubHubBub
 * @version    $Revision: 8 $
 */
class hub extends PSX_ModuleAbstract
{
	private $topic;

	public function onLoad()
	{
		header('Content-type: text/plain');

		$this->topic = $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'pubsubhubbub/topic';
	}

	public function onGet()
	{
		header('HTTP/1.1 405 Method Not Allowed');
		header('Allow: POST');

		echo 'Invalid request method';
	}

	public function onPost()
	{
		$mode = isset($_GET['hub_mode']) ? $_GET['hub_mode'] : null;

		switch($mode)
		{
			case 'subscribe':
			case 'unsubscribe':

				$this->handleSubscription($mode);

				break;

			case 'publish':

				$this->handlePublish();

				break;

			case 'fetch':

				$this->fetchContent();

				break;

			default:

				throw new PSX_Exception('Invalid mode');
		}
	}

	private function handleSubscription($mode)
	{
		$validate = new PSX_Validate();
		$post     = new PSX_Post($validate);

		$callback      = $post->hub_callback('string', array(new PSX_Filter_Length(3, 256), new PSX_Filter_Url()), 'callback', 'Callback');
		$topic         = $post->hub_topic('string', array(new PSX_Filter_Length(3, 256), new PSX_Filter_Url()), 'topic', 'Topic');
		$verify        = $post->hub_verify('string', array(new PSX_Filter_InArray(array('sync', 'async'))), 'verify', 'Verify');
		$lease_seconds = $post->hub_lease_seconds('integer');
		$secret        = $post->hub_secret('string', array(new PSX_Filter_Length(0, 199)), 'secret', 'Secret');
		$verify_token  = $post->hub_verify_token('string');

		if(!$validate->hasError())
		{
			$callback = new PSX_Url($callback);

			if($verify == 'sync')
			{
				$challenge     = md5(time());
				$lease_seconds = time() + (60 * 60 * 24 * 7);

				$callback->addParam('hub.mode', $mode);
				$callback->addParam('hub.topic', $topic);
				$callback->addParam('hub.challenge', $challenge);
				$callback->addParam('hub.lease_seconds', $lease_seconds);

				if(!empty($verify_token))
				{
					$callback->addParam('hub.verify_token', $verify_token);
				}

				$http     = new PSX_Http();
				$request  = new PSX_Http_GetRequest($callback);
				$response = $http->request($request);

				if($response->getCode() >= 200 && $response->getCode() < 300)
				{
					if($response->getBody() == $challenge)
					{
						echo 'SUCCESS ' . $mode;
					}
					else
					{
						throw new PSX_Exception('Challenge is not echoed back');
					}
				}
				else
				{
					throw new PSX_Exception('No 2xx response code');
				}
			}
			else if($verify == 'async')
			{
				throw new PSX_Exception('Only "sync" verification is at the moment supported');
			}
		}
		else
		{
			throw new PSX_Exception($validate->getLastError());
		}
	}

	private function handlePublish()
	{
		$validate = new PSX_Validate();
		$post     = new PSX_Post($validate);

		$url = $post->hub_url('string', array(new PSX_Filter_Length(3, 256), new PSX_Filter_Url()));

		if($url == $this->topic . '/atom' || $url == $this->topic . '/rss')
		{
			header('HTTP/1.1 204 No Content');

			echo 'SUCCESS';
		}
		else
		{
			throw new PSX_Exception('Invalid topic');
		}
	}

	private function fetchContent()
	{
		$http     = new PSX_Http();
		$request  = new PSX_Http_GetRequest(new PSX_Url($this->topic));
		$response = $http->request($request);

		if($response->getCode() == 200)
		{
			$header = $request->getHeader();

			if($header['content-type'] == 'application/atom+xml')
			{
				$atom = new PSX_Atom();
				$atom->import($response);

				echo 'SUCCESS';
			}
			else if($header['content-type'] == 'application/rss+xml')
			{
				$rss = new PSX_Rss();
				$rss->import($response);

				echo 'SUCCESS';
			}
			else
			{
				throw new PSX_Exception('Invalid content type');
			}
		}
		else
		{
			throw new PSX_Exception('Invalid response code');
		}
	}
}


