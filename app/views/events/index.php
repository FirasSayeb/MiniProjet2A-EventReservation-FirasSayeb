<head>
<link rel="stylesheet" href=" http://localhost/MiniEvent/public/css/style.css">
</head>
<?php require __DIR__ . '/../partials/header.php';  ?>
<div>
    <h1>All Events</h1>

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
                <td><img src="<?= $event->image ?>" alt="event"/></td>

                <td><a href="http://localhost/MiniEvent/public/events/<?= $event->id ?>">View</a>
                <a href="http://localhost/MiniEvent/public/events/<?= $event->id ?>/reserve">Reserve</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>

    
</div>
<?php require __DIR__ . '/../partials/footer.php';  ?>
