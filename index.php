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

<?php

require_once 'db.php';

    echo "<div class=container>";
    foreach ($results as $shoe)
    {
        echo "<div class=box>";
        echo '<img src=' . $shoe['image'] . '>';
        echo '<hr>';
        echo "<h4 class='brand'>" . $shoe['brand'] . ' ~ '.$shoe['name'] . "</h4>";
        echo "<h4>Colour: " . $shoe['colour'] . "</h4>";
        echo "<h4>Price: £" . $shoe['cost'] . "</h4>";
        echo "</div>";
    }
        echo "<div class=box> <a href='form.php'><h1>Add<br>Shoe<br>+</h1></a></div>";





?>

</body>
</html>
