<?php

require_once 'db.php';
function queryString()
{
    if (isset($_POST['brandFilter']))
    {
        return 'WHERE `brand` = "' . $_POST['brandFilter'] . '"';
    }
    else
    {
        return '';
    }
}

function sorting()
{
    if (isset($_POST['sort']) == 'brand' || isset($_POST['sort']) == 'cost' ||  isset($_POST['sort']) == 'brand DESC' ||  isset($_POST['sort']) == 'cost DESC')
    {
        return 'ORDER BY ' . $_POST['sort'];
    }
    else
    {
        return '';
    }
}

$query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`" . queryString() . sorting());
$query->execute();
$results = $query->fetchAll();
