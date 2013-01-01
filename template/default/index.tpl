<?php include($location . '/inc/header.tpl'); ?>


<h1><a href="<?php echo $url; ?>">Test</a></h1>


<h2>Description</h2>

<p><b>Welcome</b> to the testarea of the <a href="http://phpsx.org">PSX</a>
framework. This is the testing website wich is used by the unit tests in the PSX
framwork to test more complex cases. In order to help other projects with
testing and to create interoperability libraries you can also use these testing 
endpoints. Every test module has a description how you can use it for testing 
and every test makes heavy use of HTTP status codes. If the test returns "2xx" 
status code the request was successful. All errors wich are thrown by a test 
have detailed informations about what went wrong. The following testing modules 
are currently available. The sourcecode of this website if free available at 
<a href="https://github.com/k42b3/psx-tests">github</a>. If a textcase doest not 
behave correctly do not hesitate to contact me.</p>


<h2>Endpoints</h2>

<ul>
	<?php foreach($tests as $test): ?>
	<li><a href="<?php echo $test['href']; ?>"><?php echo $test['file']; ?></a></li>
	<?php endforeach; ?>
</ul>


<h2>History</h2>

<ul>
	<li>01.01.2013 - Added pingback test</li>
	<li>01.01.2013 - Added source to git repository</li>
</ul>

<h2>Contact</h2>

<p>If you are using these test cases please drop me an email so I can inform you
about any changes. Also if you have any questions or suggestions for
improvement you can write me an email at k42b3.x (at) gmail [dot] com.</p>


<?php include($location . '/inc/footer.tpl'); ?>


