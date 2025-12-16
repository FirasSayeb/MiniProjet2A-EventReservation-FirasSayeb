<?php

require __DIR__ ."/../models/Event.php";

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

}
