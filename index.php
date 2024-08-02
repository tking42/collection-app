<html lang="en">
<head>
    <title>Trainer Tracker</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<header>
    <div>
        <h1>Trainer Tracker</h1>
        <h3>A virtual room to store your shoes...</h3>
    </div>
</header>
<main>
    <div class="sort">
        <form method="post" action="index.php">
            <div>
                    <label for="sortID">Sort: </label>
                    <select required id="sortID" name="sort">
                        <option value="noSort">Please Select</option>
                        <option value="brand">Brand A-Z</option>
                        <option value="brand DESC">Brand Z-A</option>
                        <option value="cost">Cost low-high</option>
                        <option value="cost DESC">Cost high-low</option>
                    </select>
            </div>
            <div>
                <label for="filterID">Brand filter: </label>
                <select required id="filterID" name="brandFilter">
                    <option value="noSort">All</option>
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
            <div>
                <input type="submit" value="Go!">
            </div>
        </form>
    </div>


<?php

require_once 'functions.php';

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
        echo "<h4 class='remove'><a href='remove.php'>Remove</a></h4>";
        echo "<h4 class='date'>" . $shoe['dateAdded'] . "</h4>";
        echo "</div>";
    }
        echo "<div class=box id='addBox'> <a href='form.php'><h1>Add<br>Shoe<br>+</h1></a></div>";
?>
</main>

<?php
if (isset($_POST['sort']) || isset($_POST['brandFilter']))
{
    echo "<nav>";
    echo "<div class='reset'><a href=index.php><h4>Reset</h4></a></div>";
    echo "</nav>";
}
?>
</body>
</html>
