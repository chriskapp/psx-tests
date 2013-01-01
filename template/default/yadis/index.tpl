<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Yadis</h1>


<h2>Description</h2>

<p>This module is for testing yadis discovery. The XRDS file can be discovered
via the <em>X-XRDS-Location</em> header field.</p>

<h2>Endpoints</h2>

<dl>
	<dt>Xrds</dt>
	<dd><a href="<?php echo $url; ?>yadis/xrds"><?php echo $url; ?>yadis/xrds</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://yadis.org/papers/yadis-v1.0.pdf">http://yadis.org/papers/yadis-v1.0.pdf</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


