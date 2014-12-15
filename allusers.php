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
        <link rel="stylesheet" href="css/main.css"/>
    </head>
    <body>
        <?php
        require_once './libs/SqlUserRepository.class.php';
        $sql = new SqlUserRepository();
        $users = $sql->GetAllUsers();
        echo '<table>';
        echo '<tr><th>login</th><th>hasło</th></tr>';
        foreach ($users as $user) {
            echo '<tr><td>'.$user->getLogin().'</td><td>'.$user->getPassword().'</td></tr>';
        }
        echo '<table>';
        ?>
    </body>
</html>
