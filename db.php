<?php

$db = new PDO('mysql:host=db; dbname=shoes', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    if (isset($_POST['sort']) && $_POST['sort'] == 'costSort')
    {
        $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes` ORDER BY `cost`");
    }
    elseif (isset($_POST['sort']) && $_POST['sort'] == 'brandSort')
    {
        $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes` ORDER BY `brand`, `name`");
    }
    else
    {
        $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`");
    }

    $query->execute();
    $results = $query->fetchAll();