<head>
<link rel="stylesheet" href=" http://localhost/MiniEvent/public/css/reserve.css">
</head>
<div>
    <h1>Login</h1>
    <form method="POST">
        <fieldset>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" required>
        </fieldset>
        <fieldset>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required>
        </fieldset>
       
       
        <button type="submit">Login</button>
    </form>
</div>
<?php require __DIR__ . '/../partials/footer.php';  ?>

