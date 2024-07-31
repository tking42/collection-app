<?php
require_once 'db.php';
?>

<html lang="en">
<head>
    <title>Trainer Tracker</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">

</head>
<body>
<nav>
        <h1>Trainer Tracker</h1>
        <h3>A virtual room to store your shoes...</h3>
</nav>
<form method="post" class="box">
        <a href="index.php">ⅹ</a>
        <h4>Add shoe to your collection: </h4>
    <div class="label">
        <label for="brandID">Brand: <p class="required">required</p></label>
        <select required id="brandID" name="brand">
            <option disabled value="select">Please Select</option>
            <option value="adidas">Adidas</option>
            <option value="nike">Nike</option>
            <option value="reebok">Reebok</option>
            <option value="vans">Vans</option>
            <option value="converse">Converse</option>
            <option value="puma">Puma</option>
            <option value="newBalance">New Balance</option>
            <option value="asics">Asics</option>
            <option value="solomon">Solomon</option>
            <option value="fila">Fila</option>
            <option value="skechers">Skechers</option>
            <option value=other"">Other</option>
        </select>
    </div>
    <br>
    <div>
        <label for="nameID">Name: <p class="required">required</p></label>
        <input required id="nameID" name="name" type="text" placeholder="e.g. Sambas">
    </div>
    <br>
    <div>
        <label for="colourID">Colour: <p class="required">required</p></label>
        <input required id="colourID" name="colour" type="text" placeholder="e.g. Blue">
    </div>
    <br>
    <div>
        <label for="costID">Cost (£): </label>
        <input id="costID" name="cost" type="number" placeholder="e.g. 80">
    </div>
    <br>
    <div>
        <label for="imgID">Image: </label>
        <input id="imgID" name="image" type="text" placeholder="e.g. adidasSambas.png">
    </div>

    <br>
    <div>
        <input type="submit" class="btn">
    </div>
</form>
</body>
</html>

<?php

if (isset($_POST['brand']) && isset($_POST['name']) && isset($_POST['colour']) && isset($_POST['cost']) && isset($_POST['image']))
{

        if ($_POST['brand'] !== 'select')
        {
            $brand = $_POST['brand'];
        }

        if (gettype($_POST['name']) === 'string')
        {
            $name = trim($_POST['name']);
        }

        if (gettype($_POST['colour']) === 'string')
        {
            $colour = ucfirst(trim($_POST['colour']));
        }

        if ($_POST['cost'] === '')
        {
            $_POST['cost'] = null;
        }
        else
        {
            $cost = $_POST['cost'];
        }

        $regex = '/\.(png|jpeg|jpg)$/i';

        if (gettype($_POST['image']) === 'string' && preg_match($regex ,$_POST['image']))
        {
            $image = $_POST['image'];
        }
        else
        {
            $image = 'placeholder.png';
        }

    $query = $db->prepare("INSERT INTO `shoes` (`brand`, `name`, `colour`, `cost`, `image`) VALUES (:brand, :name, :colour, :cost, :image);");

    $query->bindParam(':brand', $brand);
    $query->bindParam(':name', $name);
    $query->bindParam(':colour', $colour);
    $query->bindParam(':cost', $cost);
    $query->bindParam(':image', $image);

    $query->execute();
}

?>
