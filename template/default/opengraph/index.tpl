<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Opengraph</h1>


<h2>Description</h2>

<p>This is for testing an Opengraph parser. The endpoint is a simple website
including some Opengraph meta tags. The content type is <em>text/html</em></p>


<h2>Endpoints</h2>

<dl>
	<dt>Graph</dt>
	<dd><a href="<?php echo $url; ?>opengraph/graph"><?php echo $url; ?>opengraph/graph</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://ogp.me/">http://ogp.me/</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


