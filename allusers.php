<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/main.css"/>
    </head>
    <body>
        <?php
        require_once './libs/SqlUserRepository.class.php';
        $sqlrepo = new SqlUserRepository();
        $users = $sqlrepo->GetAllUsers();
        echo'<ul>';
        foreach ($users as $user) {
           echo'<li>user: '.$user->getLogin().' hasło: '.$user->getPassword().'</li>'; 
        }
        echo '</ul>';
        ?>
    </body>
</html>
