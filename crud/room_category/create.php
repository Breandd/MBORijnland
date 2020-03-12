<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 18:09
 */

include_once "../config.php";

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $roomcat = $_POST['rocat'];
    $catname = $_POST['catname'];
    $catprice = $_POST['catprice'];
    $maxp = $_POST['maxp'];

    if(empty($roomcat) || empty($catname) || empty($catprice)  || empty($maxp)){
        if(empty($roomcat))
        {
            echo "<span style='color: red;'>Please enter a room category</span>";
        }
        if(empty($catname))
        {
            echo "<span style='color: red'>Please enter a Category name</span>";
        }
        if(empty($catprice))
        {
            echo "<span style='color: red'>Please enter the room price</span>";
        }
        if(empty($maxp))
        {
            echo "<span style='color: red'>Please enter the maximum number of people for the designated category</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    }
    else
    {
        $result = mysqli_query($db, "INSERT INTO kamer_categorie(categorie_code, categorie_naam, categorieprijs, categorie_maxp)
                                           VALUES ('$roomcat','$catname','$catprice','$maxp')");

        echo "<span style='color: green;'>Room category successfully added</span>";
        echo "<a href='index.php'>View result</a>";
    }
}

?>
