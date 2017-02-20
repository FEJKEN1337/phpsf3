<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Zarezerwuj Pokój Hotelowy</title>
	
	
	<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('css/style.css')?>" />
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('css/fontello.css')?>" />
	<link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	
        <script src="<?php echo $view['assets']->getUrl('js/jquery-1.9.1.min.js')?>"></script>
        
</head>
<body onload="odliczanie();">
    <?php $view['slots']->output('_content'); ?>
</body>
</html>