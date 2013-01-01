<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Webfinger</h1>


<h2>Description</h2>

<p>This module is for testing an webfinger based discovery. The Hostmeta file
contains an lrdd link template where you can reuqest an XRD about an account
i.e. <em>acct:foo@foo.com.</em>. The content type for both endpoints is
<em>application/xrd+xml</em>.</p>


<h2>Endpoints</h2>

<dl>
	<dt>Hostmeta</dt>
	<dd><a href="<?php echo $url; ?>webfinger/hostmeta"><?php echo $url; ?>webfinger/hostmeta</a></dd>
	<dd><a href="<?php echo $url; ?>.well-known/host-meta"><?php echo $url; ?>.well-known/host-meta</a></dd>
	<dt>Lrdd</dt>
	<dd><a href="<?php echo $url; ?>webfinger/lrdd"><?php echo $url; ?>webfinger/lrdd</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://code.google.com/p/webfinger/wiki/WebFingerProtocol">http://code.google.com/p/webfinger/wiki/WebFingerProtocol</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


