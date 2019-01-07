<?php
    include '../elems/init.php';
    
    if(!empty($_SESSION['auth'])){
	    function GetPAGE(){
	    	$title = 'admin';
	    	if(isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])){
		    	$title = $_POST['title'];
		    	$url = $_POST['url'];
		    	$text = $_POST['text'];
		    }else{
		    	$title = '';
		    	$url = '';
		    	$text = '';
		    }
	    	ob_start();
			include 'elems/form.php';
			$content = ob_get_clean();
			include 'elems/layout.php';
	    }
	    function addPage($link){
		    if(isset($_POST['title'])and isset($_POST['url'])and isset($_POST['text'])){
		    	$title = mysqli_real_escape_string($link, strip_tags($_POST['title']));
		    	$url = mysqli_real_escape_string($link,  strip_tags($_POST['url']));
		    	$text = mysqli_real_escape_string($link,  strip_tags($_POST['text']));

		    	$query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
		        $result = mysqli_query($link,$query) or die(mysql_error($link));
		        $isPage = mysqli_fetch_assoc($result)['count'];

	            if($isPage){
	            	$_SESSION['message'] = ['text'=>'Page with this url exist','status'=>'error'];
	            }else{
	            	$query = "INSERT INTO pages (title,url,text) VALUES ('$title','$url','$text')";
		            mysqli_query($link,$query) or die(mysql_error($link));

		            $_SESSION['message'] = ['text'=>'Page added sucess','status'=>'success'];
		            header('Location: /admin/'); die();
	            }
		    }
	    }
	    addPage($link);
	    GetPage();
	}else{
        header('Location: /admin/login.php');
        die();
    }
?>
    

