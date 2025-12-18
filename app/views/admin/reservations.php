<head>
<link rel="stylesheet" href="http://localhost/MiniEvent/public/css/style.css">
</head>
<?php  require __DIR__ . '/../partials/AdminNavbar.php';  ?>
<div>
    <form method="POST">
    <label for="event">Rechercher par event </label>
    <input type="search" name="event" id="event">
    <button type="submit">Rechercher</button>
</form>
 <h1>Reservations</h1>
 <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date Reservation</th>
               
            </tr>
        </thead>

        <?php foreach ($reservations as $reservation): ?>
            <tr>
              
                <td><?= $reservation['id'] ?></td>
                <td><?= $reservation["title"] ?></td>
                <td><?=$reservation["name"]  ?></td>
                <td><?= $reservation["email"]  ?></td>
                <td><?= $reservation["phone"] ?></td>
                <td><?= $reservation["created_at"]  ?></td>
               
                 
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<?php require __DIR__ . '/../partials/footer.php';  ?>