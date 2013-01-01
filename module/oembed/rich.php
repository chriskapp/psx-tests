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

namespace oembed;

use PSX_Module_ViewAbstract;
use PSX_Url;

/**
 * rich
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Oembed
 * @version    $Revision: 3 $
 */
class rich extends PSX_Module_ViewAbstract
{
	public function onLoad()
	{
		$url = new PSX_Url('http://test.phpsx.org/oembed/server');
		$url->addParam('url', 'http://test.phpsx.org/oembed/rich');

		$this->template->assign('meta', array('<link rel="alternate" type="application/json+oembed" title="Oembed test" href="' . strval($url) . '" />'));

		$this->template->set('oembed/rich.tpl');
	}
}