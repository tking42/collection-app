<html lang="en">
<head>
    <title>Crep Collector</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com" rel="stylesheet">
</head>
<body>
<nav>
    <h1>Trainer Tracker</h1>
</nav>


<?php

$db = new PDO('mysql:host=db; dbname=shoes', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `brand`, `name`, `color`, `cost`, `image` FROM `shoes`');
$query->execute();
$results = $query->fetchAll();

echo "<div class=container>";

foreach ($results as $shoe)
{
    echo "<div class=box>";
    echo '<img src=' . $shoe['image'] . '>' . "\n";
    echo "<h4>" . $shoe['brand'] . "</h4>";
    echo "<h4>" . $shoe['name'] . "</h4>\n";
    echo "<h4>Colour: " . $shoe['color'] . "</h4>\n";
    echo "<h4>£" . $shoe['cost'] . "</h4>\n";
    echo "</div>";
}
echo "<div class=box> 
        <a href='#'><h1>Add <br>Shoe +</h1></a>";

echo "</div>";

?>

</body>
</html>
