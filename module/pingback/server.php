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
use PSX_Exception;
use Zend_XmlRpc_Server;
use Zend_XmlRpc_Server_Fault;

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
		$server = new Zend_XmlRpc_Server();
		$server->setClass($this, 'pingback');

		Zend_XmlRpc_Server_Fault::attachFaultException('PSX_Exception');

		echo $server->handle();
	}

	/**
	 * Handles the ping request
	 *
	 * @param string $sourceUri
	 * @param string $targetUri
	 * @return string
	 */
	public function ping($sourceUri, $targetUri)
	{
		if($targetUri == 'http://test.phpsx.org/pingback/resource')
		{
			return 'Successful';
		}
		else
		{
			throw new PSX_Exception('Invalid target uri', 0);
		}
	}
}

