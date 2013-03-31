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

/**
 * hostmeta
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Webfinger
 * @version    $Revision: 3 $
 */
class hostmeta extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: application/xrd+xml');

		$host = $this->base->getHost();
		$lrddTemplate = $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'webfinger/lrdd?uri={uri}';

		$xrd = <<<XRD
<?xml version="1.0" encoding="UTF-8"?>
<XRD xmlns="http://docs.oasis-open.org/ns/xri/xrd-1.0">
	<Subject>{$this->config['psx_url']}</Subject>
	<hm:Host xmlns:hm="http://host-meta.net/xrd/1.0">{$host}</hm:Host>
	<Link rel="lrdd" type="application/xrd+xml" template="{$lrddTemplate}" />
</XRD>
XRD;

		echo $xrd;
	}
}