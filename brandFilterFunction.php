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
