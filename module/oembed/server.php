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

use PSX_ModuleAbstract;
use PSX_Oembed_Type_Link;
use PSX_Oembed_Type_Photo;
use PSX_Oembed_Type_Rich;
use PSX_Oembed_Type_Video;
use PSX_Exception;
use PSX_Data_Writer_Json;
use PSX_Data_Writer_Xml;

/**
 * server
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Oembed
 * @version    $Revision: 3 $
 */
class server extends PSX_ModuleAbstract
{
	const TYPE_LINK  = 0x1;
	const TYPE_PHOTO = 0x2;
	const TYPE_RICH  = 0x3;
	const TYPE_VIDEO = 0x4;

	private $urls = array(

		self::TYPE_LINK  => 'http://test.phpsx.org/oembed/link',
		self::TYPE_PHOTO => 'http://test.phpsx.org/oembed/photo',
		self::TYPE_RICH  => 'http://test.phpsx.org/oembed/rich',
		self::TYPE_VIDEO => 'http://test.phpsx.org/oembed/video',

	);

	public function onGet()
	{
		$url       = isset($_GET['url']) ? urldecode($_GET['url']) : null;
		$maxWidth  = isset($_GET['maxwidth']) ? intval($_GET['maxwidth']) : 240;
		$maxHeight = isset($_GET['maxheight']) ? intval($_GET['maxheight']) : 160;
		$format    = isset($_GET['format']) ? $_GET['format'] : 'json';

		$maxWidth  = $maxWidth > 80 && $maxWidth < 2048 ? $maxWidth : 80;
		$maxHeight = $maxHeight > 80 && $maxWidth < 2048 ? $maxHeight : 80;

		switch($url)
		{
			case $this->urls[self::TYPE_LINK]:

				$type = new PSX_Oembed_Type_Link();
				$type->setType('link');

				break;

			case $this->urls[self::TYPE_PHOTO]:

				$type = new PSX_Oembed_Type_Photo();
				$type->setType('photo');
				$type->setUrl('http://i2.ytimg.com/vi/AKjzEG1eItY/hqdefault.jpg');
				$type->setWidth($maxWidth);
				$type->setHeight($maxHeight);

				break;

			case $this->urls[self::TYPE_RICH]:

				$type = new PSX_Oembed_Type_Rich();
				$type->setType('rich');
				$type->setHtml('<iframe width="459" height="344" src="http://www.youtube.com/embed/AKjzEG1eItY?fs=1&feature=oembed" frameborder="0" allowfullscreen></iframe>');
				$type->setWidth($maxWidth);
				$type->setHeight($maxHeight);

				break;

			case $this->urls[self::TYPE_VIDEO]:

				$type = new PSX_Oembed_Type_Video();
				$type->setType('video');
				$type->setHtml('<iframe width="459" height="344" src="http://www.youtube.com/embed/AKjzEG1eItY?fs=1&feature=oembed" frameborder="0" allowfullscreen></iframe>');
				$type->setWidth($maxWidth);
				$type->setHeight($maxHeight);

				break;

			default:

				throw new PSX_Exception('Url not found', 404);
				break;
		}

		// set general attributes
		$type->setVersion('1.0');
		$type->setTitle('Beethoven - Rondo \'Die wut ueber den verlorenen groschen\'');
		$type->setAuthorName('LukasSchuch');
		$type->setAuthorUrl('http://www.youtube.com/user/LukasSchuch');
		$type->setProviderName('YouTube');
		$type->setProviderUrl('http://www.youtube.com/');
		$type->setThumbnailUrl('http://i2.ytimg.com/vi/AKjzEG1eItY/hqdefault.jpg');
		$type->setThumbnailWidth(480);
		$type->setThumbnailHeight(360);

		switch($format)
		{
			case 'json':

				header('Content-type: application/json+oembed');

				$writer = new PSX_Data_Writer_Json();
				$writer->write($type);

				break;

			case 'xml':

				header('Content-type: text/xml+oembed');

				$writer = new PSX_Data_Writer_Xml();
				$writer->write($type);

				break;

			default:

				throw new PSX_Exception('Invalid format');

				break;
		}
	}

	public function onPost()
	{
		throw new PSX_Exception('Method not allowed', 405);
	}
}
