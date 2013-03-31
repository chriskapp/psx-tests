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

namespace webfinger;

use PSX\ModuleAbstract;
use PSX\Input;
use PSX\Validate;
use PSX\Filter;
use PSX\Exception;

/**
 * lrdd
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Webfinger
 * @version    $Revision: 3 $
 */
class lrdd extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: application/xrd+xml');

		$get = new Input\Get(new Validate());
		$uri = $get->uri('string', array(new Filter\Length(3, 256), new Filter\Urldecode()));

		if(!empty($uri))
		{
			$url = parse_url($uri);

			if($url['scheme'] == 'acct')
			{
				$xrd = <<<XRD
<?xml version="1.0" encoding="UTF-8"?>
<XRD xmlns="http://docs.oasis-open.org/ns/xri/xrd-1.0">
	<Subject>acct:foo@foo.com</Subject>
	<Link rel="profile" href="http://test.phpsx.org/profile/foo" />
</XRD>
XRD;
			}
			else if(in_array($url['scheme'], array('http', 'https')))
			{
				$xrd = <<<XRD
<?xml version="1.0" encoding="UTF-8"?>
<XRD xmlns="http://docs.oasis-open.org/ns/xri/xrd-1.0">
	<Subject>http://blog.example.com/article/id/314</Subject>
	<Expires>2010-01-30T09:30:00Z</Expires>

	<Alias>http://blog.example.com/cool_new_thing</Alias>
	<Alias>http://blog.example.com/steve/article/7</Alias>

	<Property type='http://blgx.example.net/ns/version'>1.2</Property>
	<Property type='http://blgx.example.net/ns/version'>1.3</Property>
	<Property type='http://blgx.example.net/ns/ext' xsi:nil='true' />

	<Link rel='author' type='text/html' href='http://blog.example.com/author/steve'>
		<Title>About the Author</Title>
		<Title xml:lang='en-us'>Author Information</Title>
		<Property type='http://example.com/role'>editor</Property>
	</Link>

	<Link rel='author' href='http://example.com/author/john'>
		<Title>The other guy</Title>
		<Title>The other author</Title>
	</Link>
	<Link rel='copyright' template='http://example.com/copyright?id={uri}' />
</XRD>
XRD;
			}
			else
			{
				throw new Exception('Invalid scheme');
			}

			echo $xrd;
		}
		else
		{
			throw new Exception('Invalid uri');
		}
	}
}