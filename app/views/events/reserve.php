<head>
<link rel="stylesheet" href=" http://localhost/MiniEvent/public/css/reserve.css">
</head>
<div>
    <h1>Reserver</h1>
    <form method="POST">
        <fieldset>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" required>
        </fieldset>
        <fieldset>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required>
        </fieldset>
        <fieldset>
            <label for="telephone">Téléphone: </label>
            <input type="text" name="telephone" id="telephone" required>
             </fieldset>
             <fieldset>
                <label for="event">Event ID</label>
               <select name="event"> 
                <option value="<?= $event->id ?>"><?= $event->id ?></option>
               </select>
             </fieldset>
       
        <button type="submit">Reserver</button>
    </form>
    <a href="http://localhost/MiniEvent/public/">View All Events</a>
</div>


