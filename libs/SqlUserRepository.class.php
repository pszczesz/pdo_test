<?php

require_once 'IUserRepository.php';
require_once 'User.class.php';
require_once 'configure.php';
class SqlUserRepository implements IUserRepository {

    public function GetConection() {
        try{
        $conn = new PDO('mysql:host=localhost;dbname=logins', user  , password);
        $conn->query('set names utf8');
        
        }  catch (PDOException $ex){
            echo 'Błąd połączenia z bazą: '.$ex->getMessage();
        }
        return $conn;
    }

    public function AddUser(User $user) {
        $conn=null;
        try{
            
        $conn = $this->GetConection();
        var_dump($conn);
        $stm = $conn->prepare("INSERT INTO users( login, password) VALUES(:login,:password)");
        if ($stm->execute(array(':login'=>$user->getLogin(),
                ':password'=>md5($user->getPassword())))) {
            
            echo '<p>Dodano użytkownika</p>';
            
        }else{
            echo '<p>Bład dodania użytkownika</p>';
            
        }
        }  catch (PDOException $expdo){
            echo '<p>Błąd połączenia z bazą: '.$expdo->getMessage().'</p>';
        }
        return null;

    }

    public function DeleteUser(User $user) {
        
    }
    private function GenerArrayUsers(PDOStatement $stm) {
        $users = [];
        if($stm->rowCount()>0){
              //$result = $stm->fetchAll();
              foreach ($stm->fetchAll() as  $user) {
                 $users[] = new User($user['login'], $user['password']);
              }
              return $users;
          }
    }
    public function GetAllUsers() {
        $conn=null;
        try{
          
          $conn = $this->GetConection();
          $stm = $conn->query('select login,password from users');
          return $this->GenerArrayUsers($stm);
          //var_dump($users);
        } catch (PDOException $ex) {
            echo '<p>Błąd zapytania z bazy: '.$ex->getMessage().'</p>';
        }
    }

    public function GetUser(User $user) {
        $conn=null;
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
