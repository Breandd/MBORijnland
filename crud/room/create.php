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
    $roomnum = $_POST['knum'];
    $catcode = $_POST['catcode'];
    $rava = $_POST['rava'];

    if(empty($roomnum) || empty($catcode) || empty($rava)  || empty($id)){
        if(empty($roomnum))
        {
            echo "<span style='color: red;'>Please enter a room number</span>";
        }
        if(empty($roomnum))
        {
            echo "<span style='color: red'>Please enter a Category code</span>";
        }
        if(empty($rava))
        {
            echo "<span style='color: red'>Please enter if the room is available</span>";
        }
        if(empty($id))
        {
            echo "<span style='color: red'>Please enter an ID</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    }
    else
    {
        $result = mysqli_query($db, "INSERT INTO kamer(Kamernummer, Categorie_Code, Kamer_Beschikbaar) 
                                           values('$roomnum', '$catcode', '$rava')");

        echo "<span style='color: green;'>Room successfully added</span>";
        echo "<a href='index.php'>View result</a>";
    }
}

?>
