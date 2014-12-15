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
            $user = new User(filter_input(INPUT_POST, 'login'), filter_input(INPUT_POST, 'password'));
            $sql = new SqlUserRepository();
            $sql->AddUser($user);
        }
        ?>
    </body>
</html>
