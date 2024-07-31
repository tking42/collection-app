<html lang="en">
<head>
    <title>Trainer Tracker</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">

</head>
<body>
<nav>
    <div>
        <h1>Trainer Tracker</h1>
        <h3>A virtual room to store your shoes...</h3>
    </div>
<!--    <div>-->
<!--        <form>-->
<!--            <input id="searchID" name="search" type="text" placeholder="Search">-->
<!--        </form>-->
<!--    </div>-->
</nav>
<main>
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
        echo "<h4>Price: ";
        if ($shoe['cost'] == NULL)
        {
            echo "N/A";
        }
        else
        {
            echo "£" . $shoe['cost'];
        }

        echo "</h4>";
        echo "</div>";
    }
        echo "<div class=box> <a href='form.php'><h1>Add<br>Shoe<br>+</h1></a></div>";

//$search = $_POST['search'];
//$query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost` FROM `shoes` WHERE `name` LIKE :search OR `colour` LIKE :search OR `brand` LIKE :search OR `colour` LIKE :search");
//$query->bindParam(':search', $search);
//echo "$search"
?>
</main>
</body>
</html>
