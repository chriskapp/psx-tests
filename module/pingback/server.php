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

namespace pingback;

use PSX_ModuleAbstract;
use PSX_Base;

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
class server extends PSX_ModuleAbstract
{
	public function onLoad()
	{
		$res = xmlrpc_server_create();
		xmlrpc_server_register_method($res, 'pingback.ping', array($this, 'handle'));
		$resp = xmlrpc_server_call_method($res, PSX_Base::getRawInput(), null);
		xmlrpc_server_destroy($res);

		header('Content-Type: text/xml');
		echo $resp;
	}

	public function handle($name, $args)
	{
		if($args[1] == 'http://test.phpsx.org/pingback/resource')
		{
			return 'Successful';
		}
		else
		{
			return array(
				'faultCode'   => 16,
				'faultString' => 'Invalid target URI',
			);
		}
	}
}

