<?php

require_once 'brandFilterFunction.php';

if (isset($_POST['sort']) && $_POST['sort'] == 'costSort')
{
    $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM " . queryString() . "`shoes` ORDER BY `cost`");
}
elseif (isset($_POST['sort']) && $_POST['sort'] == 'dscCostSort')
{
    $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`" . queryString() . " ORDER BY `cost` DESC");
}
elseif (isset($_POST['sort']) && $_POST['sort'] == 'dscBrandSort')
{
    $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`" . queryString() . " ORDER BY `brand` DESC");
}
elseif (isset($_POST['sort']) && $_POST['sort'] == 'brandSort')
{
    $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`" . queryString() . " ORDER BY `brand`");
}
else
{
    $query = $db->prepare("SELECT `brand`, `name`, `colour`, `cost`, `image` FROM `shoes`" . queryString());
}

$query->execute();
$results = $query->fetchAll();