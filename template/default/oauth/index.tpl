<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Oauth</h1>


<h2>Description</h2>

<p>This module is for testing an Oauth consumer. To get access to the Oauth
"Protected Resource" you have to follow these steps. Iam using the terms of the
Oauth specification so it is recommended to read it before.</p>

<p>The Oauth server response with the same values as defined in the example of
the specification. Because its a test you dont have to authenticate at the
"Authorization URI" that means the verifier is displayed in plain/text if you
make an get request with the oauth_token to the "Authorization URI". If you have
successful estaplished an token and token secret you can make an OAuth request
to the "Protected Resource". If the request was successful it returns "SUCCESS".</p>

<dl>
	<dt>Client Identifier</dt>
	<dd>dpf43f3p2l4k3l03</dd>
	<dt>Client Shared-Secret</dt>
	<dd>kd94hf93k423kf44</dd>
</dl>


<h2>Endpoints</h2>

<dl>
	<dt>Temporary Credentials Request</dt>
	<dd><a href="<?php echo $url; ?>oauth/requestToken"><?php echo $url; ?>oauth/requestToken</a></dd>
	<dt>Resource Owner Authorization URI</dt>
	<dd><a href="<?php echo $url; ?>oauth/auth"><?php echo $url; ?>oauth/auth</a></dd>
	<dt>Token Request URI</dt>
	<dd><a href="<?php echo $url; ?>oauth/accessToken"><?php echo $url; ?>oauth/accessToken</a></dd>
	<dt>Protected Resource</dt>
	<dd><a href="<?php echo $url; ?>oauth/api"><?php echo $url; ?>oauth/api</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://www.ietf.org/rfc/rfc5849.txt">http://www.ietf.org/rfc/rfc5849.txt</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


