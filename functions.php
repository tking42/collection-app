<?php

require_once 'db.php';
function filter()
{
      if (isset($_POST['brandFilter']) && $_POST['brandFilter'] !== 'noSort')
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
        if ((isset($_POST['sort']) == 'brand' || isset($_POST['sort']) == 'cost' ||  isset($_POST['sort']) == 'brand DESC' ||  isset($_POST['sort']) == 'cost DESC') && $_POST['sort'] !== 'noSort')
        {
            return 'ORDER BY ' . $_POST['sort'];
        }
        else {
            return 'ORDER BY `dateAdded` DESC';
        }
}

function remove()
{
    if (isset($_POST['remove']) == 'id')
    {
        return 'DELETE FROM `shoes` WHERE `id`= ' . $_POST['remove'];
    }
    else
    {
       return '';
    }
}

$query = $db->prepare("SELECT `id`, `brand`, `name`, `colour`, `cost`, `image`, `dateAdded` FROM `shoes` " . filter() . sorting());
$query->execute();
$results = $query->fetchAll();


