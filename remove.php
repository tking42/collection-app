<?php
require_once 'db.php';
require_once 'functions.php';
?>

<html lang="en">
<head>
    <title>Trainer Tracker</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap"
        rel="stylesheet">
</head>
<body>
<header>
    <h1>Trainer Tracker</h1>
    <h3>A virtual room to store your shoes...</h3>
</header>
<form method="post" class="box" id="removeForm">
    <a href="index.php">ⅹ</a>
    <?php
    echo "<legend><h4>Remove shoe:</h4></legend>";
    foreach ($results as $shoe)
    {
        echo "<label for=" . $shoe['id'] . ">" . $shoe['brand'] . " ~ " . $shoe['name'] . "</label>";
        echo "<input type='radio' id='radio' name='remove' value='" . $shoe['id'] . "'>";
    }
    if (isset($_POST['remove']))
    {
        $deleteQuery = $db->prepare(remove());
        $deleteQuery->execute();
    }
    ?>
    <div>
        <input type="submit" class="btn">
    </div>
</form>
</body>
</html>
