<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a> / Exception</h1>


<h2>An internal error has occurred</h2>

<p><?php echo $message; ?></p>


<?php if(isset($debug)): ?>

	<div><pre class="error"><?php echo $debug; ?></pre></div>

<?php endif; ?>


<?php include($location . '/inc/footer.tpl'); ?>

