<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 18:06
 */

$db = mysqli_connect("localhost", "root", "", "hotel");

if($db ->connect_error)
{
    echo"$db->connect_error";
}

?>