<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Rss</h1>


<h2>Description</h2>

<p>This module is for testing an rss feed parser. The url "Feed" serves an
single-entry Rss Feed Document taken from the specification. The content type
is <em>application/rss+xml</em>. The entries doesnt change so you can test
whether the values are correct parsed.</p>


<h2>Endpoints</h2>

<dl>
	<dt>Feed</dt>
	<dd><a href="<?php echo $url; ?>rss/feed"><?php echo $url; ?>rss/feed</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://cyber.law.harvard.edu/rss/rss.html">http://cyber.law.harvard.edu/rss/rss.html</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


