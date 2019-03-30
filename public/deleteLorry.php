<?php

require_once __DIR__.'/../src/Model/Lorry.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    \Model\Lorry::delete(intval($_POST['lorryId']));
    header('location: index.php');
}

?>

<form method="post">
    <label for="carId">Lorry Id to delete</label>
    <input type="text" name="lorryId">
    <button>Delete lorry</button>
</form>
