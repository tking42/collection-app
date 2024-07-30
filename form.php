<?php
require_once 'db.php';
?>

<html lang="en">
<head>
    <title>Trainer Tracker</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com" rel="stylesheet">
</head>
<body>
<nav>
    <h1>Trainer Tracker</h1>
    <h3>A virtual place to store your shoes...</h3>
</nav>
<form method="post" class="box">
        <a href="index.php">ⅹ</a>
        <h4>Add shoe to your collection: </h4>
    <div class="label">
        <label for="brandID">Brand: </label>
        <input required id="brandID" name="brand" type="text" placeholder="e.g. Adidas">
    </div>
    <br>
    <div>
        <label for="nameID">Name: </label>
        <input required id="nameID" name="name" type="text" placeholder="e.g. Sambas">
    </div>
    <br>
    <div>
        <label for="colourID">Colour: </label>
        <input required id="colourID" name="colour" type="text" placeholder="e.g. Blue">
    </div>
    <br>
    <div>
        <label for="costID">Cost (£): </label>
        <input required id="costID" name="cost" type="number" placeholder="e.g. 80">
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
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $colour = $_POST['colour'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];

    $shoe['brand'] = $brand;
    $shoe['name'] = $name;
    $shoe['colour'] = $colour;
    $shoe['cost'] = $cost;
    $shoe['image'] = $image;


    $query = $db->prepare("INSERT INTO `shoes` (`brand`, `name`, `colour`, `cost`, `image`) VALUES (:brand, :name, :colour, :cost, :image);");

    $query->bindParam(':brand', $brand);
    $query->bindParam(':name', $name);
    $query->bindParam(':colour', $colour);
    $query->bindParam(':cost', $cost);
    $query->bindParam(':image', $image);

    $query->execute();
}
?>
