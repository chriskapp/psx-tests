<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Http</h1>


<h2>Description</h2>

<p>This module is for testing an http client whether it can make correct http
requests. You can make an GET, POST, PUT or DELETE requests to the defined
endpoints. If the request method is correct it will return "SUCCESS" else it
returns "FAILURE [method]". Note the "X-Http-Method-Override" header is also
accepted so if you make an POST request with an "X-Http-Method-Override: GET"
to the GET endpoint it will output "SUCCESS". The redirect enspoint redirects
you twice to a new location in order to test whether your http client can
redirect you correct.</p>


<h2>Endpoints</h2>

<dl>
	<dt>Head</dt>
	<dd><a href="<?php echo $url; ?>http/head"><?php echo $url; ?>http/head</a></dd>
	<dt>Get</dt>
	<dd><a href="<?php echo $url; ?>http/get"><?php echo $url; ?>http/get</a></dd>
	<dt>Post</dt>
	<dd><a href="<?php echo $url; ?>http/post"><?php echo $url; ?>http/post</a></dd>
	<dt>Put</dt>
	<dd><a href="<?php echo $url; ?>http/put"><?php echo $url; ?>http/put</a></dd>
	<dt>Delete</dt>
	<dd><a href="<?php echo $url; ?>http/delete"><?php echo $url; ?>http/delete</a></dd>
	<dt>Redirect</dt>
	<dd><a href="<?php echo $url; ?>http/redirect"><?php echo $url; ?>http/redirect</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://www.ietf.org/rfc/rfc2616.txt">http://www.ietf.org/rfc/rfc2616.txt</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


