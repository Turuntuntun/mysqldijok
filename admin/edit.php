<?php
    include '../elems/init.php';
    
    if(!empty($_SESSION['auth'])){
	    function GetPAGE($link){
	    	$title = 'admin';

	    	if(isset($_GET['id'])){
		    	$editId = $_GET['id'];
		    	$query = "SELECT * FROM pages WHERE id='$editId'";
		        $result = mysqli_query($link,$query) or die(mysql_error($link));
		        $page = mysqli_fetch_assoc($result);

			    if($page){

		        	if(isset($_POST['title']) and isset($_POST['url'])and isset($_POST['text'])){
				    	$title = $_POST['title'];
				    	$url = $_POST['url'];
				    	$text = $_POST['text'];
				    }else{  
				    	$title = $page['title'];
				    	$url = $page['url'];	
				    	$text = $page['text'];
				    }
					ob_start();
					include 'elems/form.php';
					$content = ob_get_clean();
		        }else{
					$content = 'Page not found';
		        }
		    }else{
		    	$content = 'Page not found';
		    }

			include 'elems/layout.php';
	    }
	    function editPage($link){
		    if(isset($_POST['title']) and isset($_POST['url'])and isset($_POST['text'])){
		    	$title = mysqli_real_escape_string($link, strip_tags($_POST['title']));
		    	$url = mysqli_real_escape_string($link,  strip_tags($_POST['url']));
		    	$text = mysqli_real_escape_string($link,  strip_tags($_POST['text']));

				if(isset($_GET['id'])){
		            $id = $_GET['id'];
		            $query = "SELECT * FROM pages WHERE id='$id'";
	                $result = mysqli_query($link,$query) or die(mysql_error($link));
	                $page = mysqli_fetch_assoc($result);
		        	$query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
			        $result = mysqli_query($link,$query) or die(mysql_error($link));
			        $isPage = mysqli_fetch_assoc($result)['count'];
			        
			        if($isPage == 1 and $page['url'] !== $url){
			        	$_SESSION['message'] = ['text'=>'Page with this url exist','status'=>'error'];
			        }else{
			        	$query = "UPDATE pages SET title = '$title', url = '$url',text = '$text' WHERE id = $id";
			            mysqli_query($link,$query) or die(mysql_error($link));
			            $_SESSION['message'] = ['text'=>'Page  edited sucess','status'=>'success'];
		            }
		        }
	        }
	    }
	    editPage($link);
	    GetPage($link);
    }else{
        header('Location: /admin/login.php');
        die();
    }
?>


