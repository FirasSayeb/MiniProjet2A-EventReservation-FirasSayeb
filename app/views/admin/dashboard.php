<head>
<link rel="stylesheet" href="http://localhost/MiniEvent/public/css/style.css">
</head>
<?php  require __DIR__ . '/../partials/AdminNavbar.php';  ?>


<div>
    <h1>All Events</h1>
 <a class="btn add"  href="http://localhost/MiniEvent/public/admin/events/add">Add</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Seats</th>
                <th>Image</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>

        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $event->id ?></td>
                <td><?= $event->title ?></td>
                <td><?= $event->description ?></td>
                <td><?= $event->date ?></td>
                <td><?= $event->location ?></td>
                <td><?= $event->seats ?></td>
                <td><img src="/MiniEvent/<?= $event->image ?>" alt="event"></td>
                  <td>
               <a class="btn view"  href="http://localhost/MiniEvent/public/admin/events/<?= $event->id ?>">View</a>
                  <a class="btn edit" href="http://localhost/MiniEvent/public/admin/events/update/<?= $event->id ?>">Modify</a>
               <a class="btn delete" href="http://localhost/MiniEvent/public/admin/events/delete/<?= $event->id ?>"
   onclick="return confirm('Are you sure you want to delete this event?')">
   Delete
</a>

            
                
</td>
            </tr>
        <?php endforeach; ?>
    </table>

    
</div>
<?php require __DIR__ . '/../partials/footer.php';  ?>

