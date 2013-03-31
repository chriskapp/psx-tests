<?php
/*
 *  $Id: discover.php 3 2011-04-03 11:14:48Z svn $
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

use PSX\ModuleAbstract;

/**
 * discover
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    PubSubHubBub
 * @version    $Revision: 3 $
 */
class topic extends ModuleAbstract
{
	private $hub;

	public function onLoad()
	{
		$this->hub = $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'pubsubhubbub/hub';
	}

	/**
	 * @httpMethod GET
	 * @path /
	 */
	public function atom()
	{
		header('Content-type: application/atom+xml');

		$topic = $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'pubsubhubbub/topic/atom';
		$feed  = <<<FEED
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<link rel="hub" href="{$this->hub}" />
	<link rel="self" href="{$topic}" />
	<updated>2008-08-11T02:15:01Z</updated>
	<entry>
		<title>Heathcliff</title>
		<link href="http://publisher.example.com/happycat25.xml" />
		<id>http://publisher.example.com/happycat25.xml</id>
		<updated>2008-08-11T02:15:01Z</updated>
		<content>What a happy cat. Full content goes here.</content>
	</entry>
</feed>
FEED;

		echo $feed;
	}

	/**
	 * @httpMethod GET
	 * @path /rss
	 */
	public function rss()
	{
		header('Content-type: application/rss+xml');

		$topic = $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'pubsubhubbub/topic/rss';
		$feed  = <<<FEED
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<atom:link rel="hub" href="{$this->hub}" />
		<atom:link rel="self" type="application/rss+xml" href="{$topic}" />
		<lastBuildDate>Fri, 25 Mar 2011 03:45:43 +0000</lastBuildDate>
		<item>
			<title>Heathcliff</title>
			<link>http://publisher.example.com/happycat25.xml</link>
			<guid>http://publisher.example.com/happycat25.xml</guid>
			<pubDate>Fri, 25 Mar 2011 03:45:43 +0000</pubDate>
			<description>What a happy cat. Full content goes here.</description>
		</item>
	</channel>
</rss>
FEED;

		echo $feed;
	}
}

