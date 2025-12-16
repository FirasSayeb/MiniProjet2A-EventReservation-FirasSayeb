<head>
<link rel="stylesheet" href=" http://localhost/MiniEvent/public/css/details.css">
</head>

<div>
    <h1>Event Details</h1>

    <ul>
        <li><strong>ID:</strong> <?= $event->id ?></li>
        <li><strong>Title:</strong> <?= $event->title ?></li>
        <li><strong>Description:</strong> <?= $event->description ?></li>
        <li><strong>Date:</strong> <?= $event->date ?></li>
        <li><strong>Location:</strong> <?= $event->location ?></li>
        <li><strong>Seats:</strong> <?= $event->seats ?></li>
        <li><strong>Image:</strong> <img src="<?= $event->image ?>" alt="event"/></li>
    </ul>

   <a href="http://localhost/MiniEvent/public/">View All Events</a>
</div>
