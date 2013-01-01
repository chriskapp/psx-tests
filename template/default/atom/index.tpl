<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Atom</h1>


<h2>Description</h2>

<p>This module is for testing an atom feed parser. The url "Feed" serves an
single-entry Atom Feed Document taken from the specification. The content type
is <em>application/atom+xml</em>. The entries doesnt change so you can test
whether the values are correct parsed.</p>


<h2>Endpoints</h2>

<dl>
	<dt>Feed</dt>
	<dd><a href="<?php echo $url; ?>atom/feed"><?php echo $url; ?>atom/feed</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://www.ietf.org/rfc/rfc4287.txt">http://www.ietf.org/rfc/rfc4287.txt</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


