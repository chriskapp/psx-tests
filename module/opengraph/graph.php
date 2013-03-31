<?php
/*
 *  $Id: graph.php 6 2011-04-03 14:34:29Z k42b3 $
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

namespace opengraph;

use PSX\ModuleAbstract;

/**
 * graph
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Opengraph
 * @version    $Revision: 6 $
 */
class graph extends ModuleAbstract
{
	public function onLoad()
	{
		header('Content-type: text/html');

		$graph = <<<HTML
<html xmlns:og="http://ogp.me/ns#">
<head>
	<title>The Rock (1996)</title>
	<meta property="og:title" content="The Rock" />
	<meta property="og:type" content="movie" />
	<meta property="og:url" content="http://www.imdb.com/title/tt0117500/" />
	<meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />
</head>
<body>
	<h1>Open Graph protocol</h1>
	<p>The Open Graph protocol enables any web page to become a rich object in a social graph.</p>
</body>
</html>
HTML;

		echo $graph;
	}
}