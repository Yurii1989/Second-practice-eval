<?php

require_once __DIR__.'/../src/Model/Lorry.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = \Model\Lorry::read($_POST['lorryId']);
    echo "lorryId: ".$data[0].", lorry brand: ".$data[1].", lorry type: ".$data[2].", lorry horsepower: ".$data[3]
        .", lorry ownerId: ".$data[4];
}


?>
<form method="post">
    <label for="lorryId">Lorry Id to see the details</label>
    <input type="text" name="lorryId">
    <button>See the lorry</button>
</form>
<a href='index.php'>Go to main page</a>