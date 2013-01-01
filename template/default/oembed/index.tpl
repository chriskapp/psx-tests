<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Oembed</h1>


<h2>Description</h2>

<p>This module is for testing an oembed consumer. The endpoint "server" is an
oembed provider like defined in the specification. You can get informations
about the listed urls. The content type is <em>application/json+oembed</em> or
<em>text/xml+oembed</em> depending on the format parameter default is json.
The entries doesnt change so you can test whether the values are correct
parsed.</p>


<h2>Endpoints</h2>

<dl>
	<dt>Server</dt>
	<dd><a href="<?php echo $url; ?>oembed/server"><?php echo $url; ?>oembed/server</a>
		<p>Types wich can be submitted in the GET parameter "url" to the server</p>
		<dl>
			<dt>Photo</dt>
			<dd><a href="<?php echo $url; ?>oembed/photo"><?php echo $url; ?>oembed/photo</a></dd>
			<dt>Video</dt>
			<dd><a href="<?php echo $url; ?>oembed/video"><?php echo $url; ?>oembed/video</a></dd>
			<dt>Link</dt>
			<dd><a href="<?php echo $url; ?>oembed/link"><?php echo $url; ?>oembed/link</a></dd>
			<dt>Rich</dt>
			<dd><a href="<?php echo $url; ?>oembed/rich"><?php echo $url; ?>oembed/rich</a></dd>
		</dl>
	</dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://oembed.com/">http://oembed.com/</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


