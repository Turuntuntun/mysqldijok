<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="/styles.css?v=1">
    	<title><?php echo $title; ?></title>
    </head>
    <body>
    	<div id = 'wrapper'>
    		<header>
    			<?php  include 'elems/header.php'; ?>
    		</header>
    		<main>
    			<?php
                   echo $content;
                ?>
    		</main>
    		<footer>
    			footer
    		</footer>
    	</div>
    </body>

</html>