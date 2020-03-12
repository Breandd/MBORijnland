<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 18:09
 */

include_once "../config.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $code = $_POST['categorie_code'];
    $date = $_POST['date'];

    if (empty($price) || empty($code) || empty($date)) {
        if (empty($price)) {
            echo "<span style='color: red;'>Please enter a price</span>";
        }
        if (empty($code)) {
            echo "<span style='color: red'>Please enter a category code</span>";
        }
        if (empty($datum)) {
            echo "<span style='color: red'>Please enter a date</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
        $result = mysqli_query($db, "INSERT INTO prijs(prijs, categorie_code, datum) 
                                           values('$price', '$code', '$date')");

        echo "<span style='color: green;'>Room successfully added</span>";
        echo "<a href='index.php'>View result</a>";
    }
}

?>
