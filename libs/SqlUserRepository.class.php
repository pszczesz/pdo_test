<?php

require_once 'IUserRepository.php';
require_once 'User.class.php';

class SqlUserRepository implements IUserRepository {

    public function GetConection() {
        try{
        $conn = new PDO('mysql:host=localhost;dbname=logins', 'user', 'user');
        $conn->query('set names utf8');
        
        }  catch (PDOException $ex){
            echo 'Błąd połączenia z bazą: '.$ex->getMessage();
        }
        return $conn;
    }

    public function AddUser(User $user) {
        
    }

    public function DeleteUser(User $user) {
        
    }

    public function GetAllUsers() {
        
    }

    public function GetUser(User $user) {
        try{
        $conn = $this->GetConection();
        var_dump($conn);
        $stm = $conn->prepare("SELECT login, password FROM users WHERE login=?");
        if ($stm->execute(array($user->getLogin()))) {
            
            echo "<p>Użytkownik jest w bazie występuje: {$stm->rowCount()}</p>";
            $result = $stm->fetch();
            $sqlUser = new User($result['login'], $result['password']);
            return $sqlUser;
        }
        }  catch (PDOException $expdo){
            echo '<p>Błąd połączenia z bazą: '.$expdo->getMessage().'</p>';
        }
        return null;
    }

    public function UpdateUser(User $user) {
        
    }

}
