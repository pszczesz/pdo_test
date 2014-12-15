<?php

require_once 'IUserRepository.php';
require_once 'User.class.php';

class SqlUserRepository implements IUserRepository {

    public function GetConection() {
        try {
            $conn = null;
            $conn = new PDO('mysql:host=localhost;dbname=logins', 'user', 'user');
            $conn->query('set names utf8');
        } catch (PDOException $ex) {
            echo 'Błąd połączenia z bazą: ' . $ex->getMessage();
        }
        return $conn;
    }

    public function AddUser(User $user) {
        try {
            $conn = $this->GetConection();
            var_dump($conn);
            $stm = $conn->prepare("INSERT INTO USERS(login,password) VALUES(:login, :password)");
            $stm->execute(array(':login' => $user->getLogin(), ':password' => md5($user->getPassword())));

            echo "<p>Dodano użytkownika </p>";
        } catch (PDOException $expdo) {
            echo '<p>Błąd połączenia z bazą: ' . $expdo->getMessage() . '</p>';
        }
    }

    public function DeleteUser(User $user) {
        
    }

    public function GetAllUsers() {
        try {
           $conn = $this->GetConection();
            var_dump($conn);
            $stm = $conn->prepare("SELECT login, password FROM users");
            $stm->execute();
            $users = [];
            foreach ($stm->fetchAll() as $user){
                $users[] = new User($user['login'], $user['password']);
            }
            return $users;
        } catch (PDOException $expdo) {
            echo '<p>Błąd połączenia z bazą: ' . $expdo->getMessage() . '</p>';
        }
    }

    public function GetUser(User $user) {
        try {
            $conn = $this->GetConection();
            var_dump($conn);
            $stm = $conn->prepare("SELECT login, password FROM users WHERE login=?");
            if ($stm->execute(array($user->getLogin()))) {

                echo "<p>Użytkownik jest w bazie występuje: {$stm->rowCount()}</p>";
                $result = $stm->fetch();
                $sqlUser = new User($result['login'], $result['password']);
                return $sqlUser;
            }
        } catch (PDOException $expdo) {
            echo '<p>Błąd połączenia z bazą: ' . $expdo->getMessage() . '</p>';
        }
        return null;
    }

    public function UpdateUser(User $user) {
        
    }

}
