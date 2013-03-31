<?php
/*
 *  $Id: callback.php 8 2011-04-03 17:58:53Z k42b3 $
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

use PSX\PubSubHubBub\CallbackAbstract;
use PSX\Atom;
use PSX\Rss;
use PSX\Exception;
use PSX\Url;

/**
 * callback
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    PubSubHubBub
 * @version    $Revision: 8 $
 */
class callback extends CallbackAbstract
{
	public function onLoad()
	{
		header('Content-type: text/plain');

		$this->handle();
	}

	public function onAtom(Atom $atom)
	{
		if(isset($atom->entry[0]))
		{
			echo 'INSERT ATOM ' . $atom->entry[0]->title;
		}
		else
		{
			throw new Exception('No entry available');
		}
	}

	public function onRss(Rss $rss)
	{
		if(isset($rss->item[0]))
		{
			echo 'INSERT RSS ' . $rss->item[0]->title;
		}
		else
		{
			throw new Exception('No item available');
		}
	}

	public function onVerify($mode, Url $topic, $leaseSeconds, $verifyToken)
	{
		return true;
	}
}


