<?php

require __DIR__ ."/../models/Event.php";
require __DIR__ ."/../models/Reservation.php";
require __DIR__ ."/../models/Admin.php";

session_start();
class AdminController
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require __DIR__ . '/../../config/database.php';
    }

    public function dashboard()
    {
        if(isset($_SESSION['login'])){

            require __DIR__ . '/../views/admin/dashboard.php';

        }else{
           header('Location: ' . 'http://localhost/MiniEvent/public/admin/login' );
        }
    }

    public function login()
    {
       if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $admin = new Admin();
            $admin->username=$_POST["username"];
            $admin->password_hash=$_POST["password"];
             $sql = "SELECT * FROM admin where username =:u and password_hash=:p";
             $stmt = $this->pdo->prepare($sql);
             $stmt->bindValue(':u', $admin->username);
              $stmt->bindValue(':p', $admin->password_hash);
             $stmt->execute();
             $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if($res){
                   $_SESSION['login']=$admin->username;
                    header('Location: ' . 'http://localhost/MiniEvent/public/admin' );
                }else{
                    echo "<p style='color:red;'>login échoué</p>";
                }
              
       }
       require __DIR__ . '/../views/admin/login.php';

    }
       public function logout(){
            session_unset();
            session_destroy();
            header('Location: ' . 'http://localhost/MiniEvent/public/admin' );
       
    }
}
