<head>
    <link rel="stylesheet" href="http://localhost/MiniEvent/public/css/reussite.css">
</head>
<?php require __DIR__ . '/../partials/header.php';  ?>
<div class="success-container">
    <div class="success-card">
        <div class="icon">✔</div>

        <h1>Reservation Successful</h1>

        <p class="message">
            Your reservation for the event
            <strong><?= htmlspecialchars($event->title) ?></strong>
            has been completed successfully.
        </p>

        <div class="details">
            <p><strong>Name:</strong> <?= htmlspecialchars($_COOKIE["name"] ?? '') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($_COOKIE["email"] ?? '') ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($_COOKIE["phone"] ?? '') ?></p>
            <p><strong>Reservation Date:</strong> <?= htmlspecialchars($_COOKIE["created"] ?? '') ?></p>
        </div>
   
        <a class="btn" href="http://localhost/MiniEvent/public/">View All Events</a>
    </div>
</div>
<?php require __DIR__ . '/../partials/footer.php';  ?> 