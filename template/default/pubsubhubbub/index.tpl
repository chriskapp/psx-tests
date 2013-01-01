<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / PubSubHubBub</h1>


<h2>Description</h2>

<p>This module is to test an pubsubhubbub "Publisher" and "Subscriber". You can
try to discover an hub from the "Topic" endpoint. The hub has only one topic
wich is <em><?php echo $url; ?>pubsubhubbub/topic</em>. If you send a
"New Content Notification" or "Subscribe" request you must use this topic. You
can order the hub to fetch the topic if you send an POST request with the
"hub.mode" to "fetch".</p>


<h2>Endpoints</h2>

<dl>
	<dt>Topic</dt>
	<dd><a href="<?php echo $url; ?>pubsubhubbub/topic"><?php echo $url; ?>pubsubhubbub/topic</a>/[atom|rss]</dd>
	<dt>Hub</dt>
	<dd><a href="<?php echo $url; ?>pubsubhubbub/hub"><?php echo $url; ?>pubsubhubbub/hub</a></dd>
	<dt>Callback</dt>
	<dd><a href="<?php echo $url; ?>pubsubhubbub/callback"><?php echo $url; ?>pubsubhubbub/callback</a></dd>
</dl>


<h2>Documentation</h2>

<dl>
	<dt>Specification</dt>
	<dd><a href="http://pubsubhubbub.googlecode.com/svn/trunk/pubsubhubbub-core-0.3.html">http://pubsubhubbub.googlecode.com/svn/trunk/pubsubhubbub-core-0.3.html</a></dd>
</dl>


<?php include($location . '/inc/footer.tpl'); ?>


