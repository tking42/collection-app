<?php

$db = new PDO('mysql:host=db; dbname=shoes', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`');
$query->execute();
$results = $query->fetchAll();
