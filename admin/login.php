<?php
    include '../elems/init.php';

    $query = "SELECT * FROM password";
    $result = mysqli_query($link,$query) or die(mysql_error($link));
    for( $password = []; $row = mysqli_fetch_assoc($result); $password[] = $row);
    
    if(isset($_POST['password']) and isset($_POST['name'])){
       $user_pass = md5($_POST['password']); 
       $user= ($_POST['name']); 
    }
    
    if(isset($_POST['password']) and check_password($password,$user_pass,$user)){
    	$_SESSION['auth'] = true;
    	$_SESSION['message'] = ['text'=>'You login','status'=>'success'];
    	header('Location: /admin/'); die();
    }else{
        ?>
        <form method = 'POST'>
            <p>Введите логин
            <input type = 'text' name = 'name'></p>
            <p>Введите пароль
            <input type = 'password' name = 'password'></p>
            <input type = 'submit'>
        </form>
        <?php
    }
    function check_password($acc, $type_pass, $type_user){
        $fl = false;
        foreach ($acc as $key => $value) {
            if($value['password'] === $type_pass and $value['name'] == $type_user){
                $fl = true;
            }
        }
        return $fl;
    }
    