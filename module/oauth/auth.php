<?php
/*
 *  $Id: api.php 3 2011-04-03 11:14:48Z svn $
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

namespace oauth;

use PSX\ModuleAbstract;

/**
 * auth
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Oauth
 * @version    $Revision: 3 $
 */
class auth extends ModuleAbstract
{
	const TOKEN    = 'hh5s93j4hdidpola';
	const VERIFIER = 'hfdp7dh39dks9884';

	public function onLoad()
	{
		$token = isset($_GET['oauth_token']) ? $_GET['oauth_token'] : null;

		if($token == self::TOKEN)
		{
			header('HTTP/1.1 200 OK');
			header('Content-type: text/plain');

			echo self::VERIFIER;
			exit;

			/*
			$url = new PSX_Url($url);
			$url->addParams(array(

				'oauth_token'    => self::TOKEN,
				'oauth_verifier' => self::VERIFIER,

			));

			header('Location: ' . strval($url));

			exit;
			*/
		}
		else
		{
			header('HTTP/1.1 500 Internal Server Error');
			header('Content-Type: text/plain');

			echo 'Invalid token' . "\n";
		}
	}
}

