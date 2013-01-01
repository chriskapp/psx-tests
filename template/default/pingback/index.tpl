<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Yadis</h1>


<h2>Description</h2>

<p>This module is for testing an pingback client. The XRDS file can be discovered
via the <em>X-XRDS-Location</em> header field.</p>

<h2>Endpoints</h2>

<dl>
	<dt>Resource</dt>
	<dd><a href="<?php echo $url; ?>pingback/resource"><?php echo $url; ?>pingback/resource</a></dd>
	<dt>Server</dt>
	<dd><a href="<?php echo $url; ?>pingback/server"><?php echo $url; ?>pingback/server</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://www.hixie.ch/specs/pingback/pingback">http://www.hixie.ch/specs/pingback/pingback</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


