<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PSX Testarea</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-XRDS-Location" content="<?php echo $url; ?>yadis/xrds" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="generator" content="psx" />
	<?php
	if(isset($meta) && is_array($meta))
	{
		foreach($meta as $m)
		{
			echo $m . "\n";
		}
	}
	?>
</head>
<body>
