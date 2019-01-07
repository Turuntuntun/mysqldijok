<?php
	include '../elems/init.php';

	if(!empty($_SESSION['auth'])){
	    ?>
	    <form action = '' method = 'POST'>
	    	<p>Имя нового админа</p><input type = 'text' name = 'admin'>
	    	<p>Пароль</p><input type = 'text' name = 'pass'><br><br>
	    	<input type = 'submit'>
	    </form>
	    <?
	    if(isset($_POST['admin']) and isset($_POST['pass'])){
	    	
	    }
	}else{
        header('Location: /admin/login.php');
        die();
    }
?>