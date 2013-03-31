<?php
/*
 *  $Id: get.php 6 2011-04-03 14:34:29Z k42b3 $
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

namespace http;

use PSX\Base;
use PSX\ModuleAbstract;

/**
 * get
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Http
 * @version    $Revision: 6 $
 */
class get extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: text/plain');

		switch($this->getMethod())
		{
			case 'GET':

				echo 'SUCCESS';
				break;

			default:

				header('HTTP/1.1 405 Method Not Allowed');
				header('Allow: GET');

				echo 'FAILURE ' . $this->getMethod();
				break;
		}
	}
}