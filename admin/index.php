<?php
    include '../elems/init.php';
    
    if(!empty($_SESSION['auth'])){
        function showPageTable($link){
            $query = "SELECT * FROM pages  WHERE url!='404'";
            $result = mysqli_query($link,$query) or die(mysql_error($link));
            for( $date = []; $row = mysqli_fetch_assoc($result); $date[] = $row);
            $content = '<table><tr><th>title</th><th>url</th><th>delete</th><th>edit</th></td>';
            foreach ($date as $key => $value){
                $content .= 
                '<tr>
                    <td>'.$value['title'].'</td>
                    <td>'.$value['url'].'</td>
                    <td><a href = "?delete='.$value['id'].'">delete</a></td>
                    <td><a href = "edit.php/?id='.$value['id'].'">edit</a></td>
                </tr>';
            }
            $content .= '</table>';
            $title = 'admin';
            
            include 'elems/layout.php';
        }
        function deletePage($link){
            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                $query = "DELETE FROM pages WHERE id = $id";
                $result = mysqli_query($link,$query) or die(mysql_error($link));
                $_SESSION['message'] = ['text'=>'Page delete','status'=>'success'];
                header('Location: /admin/'); die();
            }
        }
        deletePage($link);
        showPageTable($link);
    }else{
        header('Location: /admin/login.php');
        die();
    }
?>

