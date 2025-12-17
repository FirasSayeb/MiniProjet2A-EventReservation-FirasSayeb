<?php

require __DIR__ ."/../models/Event.php";
require __DIR__ ."/../models/Reservation.php";

class EventController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require __DIR__ . '/../../config/database.php';
    }

   public function index()
{
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

    require __DIR__ . '/../views/events/index.php';
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

    require __DIR__ . '/../views/events/details.php';
}

 public function reserve($id)
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $ins=$this->pdo->prepare("INSERT INTO reservations(event_id,name,email,phone,created_at) values (:event,:name,:email,:phone,:created); ");
        $ins->bindValue(':event',$_POST["event"]);
        $ins->bindValue(':name',$_POST["nom"]);
        $ins->bindValue(':email',$_POST["email"]);
        $ins->bindValue(':phone',$_POST["telephone"]);
         $ins->bindValue(':created',date("Y-m-d H:i:s"));
         try{
            $stmt = $this->pdo->prepare(
        "SELECT * FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $stmt2 = $this->pdo->prepare(
        "SELECT count(*) as n FROM events e   join  reservations r on e.id=r.event_id   WHERE e.id = :id"
    );
    $stmt2->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt2->execute();
    $n=$stmt2->fetch(PDO::FETCH_OBJ);

    $event = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$event) {
        die("Event not found");
    }
      if ($event->seats<=0 || $n->n == $event->seats ){
            echo "<p style='color:red;'>Vous ne pouvez pas réserver cet événement</p>";
      }else{
         $ins->execute();
            setcookie("name",$_POST["nom"],time() + 86400,"/");
            setcookie("email",$_POST["email"],time() + 86400,"/");
            setcookie("phone",$_POST["telephone"],time() + 86400,"/");
            setcookie("created",date("Y-m-d H:i:s"),time() + 86400,"/");
           header('Location: ' . 'http://localhost/MiniEvent/public/events/'.$id.'/reussite' );
      }
           
         }catch(Exception $e){
             echo "<p style='color:red;'>la réservation a échoué</p>";
         }
    }
    $stmt = $this->pdo->prepare(
        "SELECT * FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $event = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$event) {
        die("Event not found");
    }

    require __DIR__ . '/../views/events/reserve.php';
}

public function reussite($id){

     $stmt = $this->pdo->prepare(
        "SELECT * FROM events WHERE id = :id"
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $event = $stmt->fetch(PDO::FETCH_OBJ);

     if (!$event) {
        die("Event not found");
    }

     require __DIR__ . '/../views/events/reussite.php';

}

}
