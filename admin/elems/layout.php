<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="/admin/styles.css?v=4">
    	<title><?php echo $title; ?></title>
    </head>
    <body>
    	<div id = 'wrapper'>
    		<header>
    			  <a href = '/admin/add.php'>Add page</a>
                  <a href = '/admin/logout.php'>Logout admin page</a>
                  <a href = '/admin/add_admin.php'>Add new admin</a>
    		</header>
    		<main>
    			<?php
                   include 'elems/info.php';
                   echo $content;
                ?>
    		</main>
    		<footer>
    			footer
    		</footer>
    	</div>
    </body>

</html>