<?php
/*
 *  $Id: feed.php 3 2011-04-03 11:14:48Z svn $
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

namespace atom;

use PSX\ModuleAbstract;

/**
 * feed
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Atom
 * @version    $Revision: 3 $
 */
class feed extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: application/atom+xml');

		$feed = <<<ATOM
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<title type="text">dive into mark</title>
	<subtitle type="html">A &lt;em&gt;lot&lt;/em&gt; of effort went into making this effortless</subtitle>
	<updated>2005-07-31T12:29:29Z</updated>
	<id>tag:example.org,2003:3</id>
	<link rel="alternate" type="text/html" hreflang="en" href="http://example.org/"/>
	<link rel="self" type="application/atom+xml" href="http://example.org/feed.atom"/>
	<rights>Copyright (c) 2003, Mark Pilgrim</rights>
	<generator uri="http://www.example.com/" version="1.0">Example Toolkit</generator>
	<entry>
		<title>Atom draft-07 snapshot</title>
		<link rel="alternate" type="text/html" href="http://example.org/2005/04/02/atom"/>
		<link rel="enclosure" type="audio/mpeg" length="1337" href="http://example.org/audio/ph34r_my_podcast.mp3"/>
		<id>tag:example.org,2003:3.2397</id>
		<updated>2005-07-31T12:29:29Z</updated>
		<published>2003-12-13T08:29:29-04:00</published>
		<author>
			<name>Mark Pilgrim</name>
			<uri>http://example.org/</uri>
			<email>f8dy@example.com</email>
		</author>
		<contributor>
			<name>Sam Ruby</name>
		</contributor>
		<contributor>
			<name>Joe Gregorio</name>
		</contributor>
		<content type="xhtml" xml:lang="en" xml:base="http://diveintomark.org/">
			<div xmlns="http://www.w3.org/1999/xhtml">
				<p><i>[Update: The Atom draft is finished.]</i></p>
			</div>
		</content>
	</entry>
</feed>
ATOM;

		echo $feed;
	}
}