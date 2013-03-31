<?php
/*
 *  $Id: index.php 3 2011-04-03 11:14:48Z svn $
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

namespace yadis;

use PSX\ModuleAbstract;

/**
 * xrds
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Yadis
 * @version    $Revision: 3 $
 */
class xrds extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: application/xrds+xml');

		$xrds = <<<XRDS
<?xml version="1.0" encoding="UTF-8"?>
<xrds:XRDS xmlns="xri://\$xrd*(\$v*2.0)" xmlns:xrds="xri://\$xrds">
	<XRD>
		<Service>
			<URI>http://test.phpsx.org</URI>
			<Type>http://ns.test.phpsx.org/2011/test</Type>
		</Service>
	</XRD>
</xrds:XRDS>
XRDS;

		echo $xrds;
	}
}
