<?php
    function createLink($href,$text,$uri){
  	   if($href == $uri){
            $class = "class = 'active'";
	    }else{
	        $class = "";
	    }
	    if($href != '/'){
	    	$href = "/$href/";
	    }
	    echo "<a href = ".$href." ".$class.">".$text."</a> ";
	  }
  

    $query = "SELECT * FROM pages WHERE url != '404'";
    $result = mysqli_query($link,$query) or die(mysql_error($link));
    for( $date = []; $row = mysqli_fetch_assoc($result); $date[] = $row);
    foreach ($date as $key => $value) {
    	createLink($value['url'],$value['title'],$uri);
    }



