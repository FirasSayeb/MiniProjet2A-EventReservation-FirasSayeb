<head>
<link rel="stylesheet" href=" http://localhost/MiniEvent/public/css/reserve.css">
</head>
<?php require __DIR__ . '/../partials/AdminNavbar.php';  ?>
<div>
    <h1>Add Event</h1>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" required>
        </fieldset>
        <fieldset>
            <label for="description">Description: </label>
            <input type="text" name="description" id="description" required>
        </fieldset>
         <fieldset>
            <label for="date">Date: </label>
            <input type="datetime-local" name="date" id="date" required>
        </fieldset>
          <fieldset>
            <label for="location">Location: </label>
            <input type="text" name="location" id="location" required>
        </fieldset>
         <fieldset>
            <label for="seats">Seats: </label>
            <input type="number" name="seats" id="seats" min="0" required>
        </fieldset>
         <fieldset>
            <label for="image">Image: </label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </fieldset>
       
       
        <button type="submit">Add</button>
    </form>
</div>
<?php require __DIR__ . '/../partials/footer.php';  ?>

