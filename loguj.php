<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './libs/SqlUserRepository.class.php';
        
         if(isset($_POST['login']) && isset($_POST['password'])){
             
             echo '<p>Logujemy...</p>';
             $login = filter_input(INPUT_POST, 'login');
             $password = filter_input(INPUT_POST, 'password');
             if($login===""||$password===""){
                 header("Location: index.php");
                 die();
             }else{
                echo '<p>Logujemy dalej...</p>'; 
                $u1 = new User($login,$password);
                $sqlRepo = new SqlUserRepository();
                $sqluser = $sqlRepo->GetUser($u1);
                if($sqluser->getPassword()===md5($u1->getPassword())){
                    echo '<p>udało się zalogować</p>';
                }else{
                    echo '<p>Błędne hasło!!</p>';
                }
             }
         }
        ?>
    </body>
</html>
