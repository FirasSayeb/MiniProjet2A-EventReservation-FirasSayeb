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
            $sql = "SELECT * FROM events";
    $stmt = $this->pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $events = [];

    foreach ($rows as $row) {
        $e = new Event();
        $e->id = $row["id"];
        $e->title = $row["title"];
        $e->description = $row["description"];
        $e->date = $row["date"];
        $e->location = $row["location"];
        $e->seats = $row["seats"];
        $e->image = $row["image"];
        $events[] = $e;
    }
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

   public function add()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            die('Image upload failed');
        }

       
        $uploadDir = __DIR__ . '/../../public/images/';

       
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('event_', true) . '.' . $extension;
        $filePath = $uploadDir . $fileName;

      
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            die('Failed to move uploaded file');
        }

      
        $dbPath = 'public/images/' . $fileName;

        
        $sql = "INSERT INTO events (title, description, date, location, seats, image)
                VALUES (:title, :description, :date, :location, :seats, :image)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':date' => $_POST['date'],
            ':location' => $_POST['location'],
            ':seats' => $_POST['seats'],
            ':image' => $dbPath
        ]);

        header('Location: http://localhost/MiniEvent/public/admin');
        exit;
    }

    require __DIR__ . '/../views/admin/add.php';
}


    public function details($id)
{
    $stmt = $this->pdo->prepare(
        "SELECT * FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $event = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$event) {
        die("Event not found");
    }

    require __DIR__ . '/../views/admin/details.php';
}

 public function update($id)
{

     $stmt = $this->pdo->prepare(
        "select * FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $event=$stmt->fetch(PDO::FETCH_OBJ);
       
     
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        
        if (isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/images/';

       
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('event_', true) . '.' . $extension;
        $filePath = $uploadDir . $fileName;
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $dbPath = 'public/images/' . $fileName;
        }else{
            $dbPath=$event->image; 
        }

        $sql = "update events set title=:title,description=:description,date=:date,location=:location,seats=:seats,image=:image;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':date' => $_POST['date'],
            ':location' => $_POST['location'],
            ':seats' => $_POST['seats'],
            ':image' => $dbPath
        ]);

        header('Location: http://localhost/MiniEvent/public/admin');
        exit;
    }

    

    require __DIR__ . '/../views/admin/update.php';
}

public function delete($id)
{
    if (!isset($_SESSION['login'])) {
        header('Location: http://localhost/MiniEvent/public/admin/login');
        exit;
    }

    $stmt = $this->pdo->prepare(
        "DELETE FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: http://localhost/MiniEvent/public/admin');
    exit;
}

public function reservations(){

     $req="select r.*,e.title from reservations r join events e on r.event_id=e.id";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $req.=" where e.title like ? or e.title like ?";
      $stmt=$this->pdo->prepare($req);  
     $params = array($_POST["event"]."%", "%".$_POST["event"]."%");
     $stmt->execute($params);
    }else{
        $stmt=$this->pdo->query($req);
        $stmt->execute();
    }

     
    $reservations=$stmt->fetchAll(PDO::FETCH_ASSOC);

    require __DIR__ . '/../views/admin/reservations.php';

}

}
