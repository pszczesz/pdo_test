<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Logowanie</title>
        <link rel="stylesheet" href="./css/main.css"/>
    </head>
    <body>
        <form action="loguj.php" method="post">
            <fieldset>
                <legend>Logowanie</legend>
                <label>login: </label>
                <input type="text" name="login"/>
                <label>hasło: </label>
                <input type="password" name="password" />
                <br>
                <input class="submit-btn" type="submit" value="Zaloguj"/>
            </fieldset>
        </form>
        <h4><a href="adduser.html" >Dodaj nowego użytkownika</a></h4>
        <h4><a href="allusers.php" >Wyświetl wszystkich użytkownika</a></h4>
        <?php
        
        ?>
    </body>
</html>
