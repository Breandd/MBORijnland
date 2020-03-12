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
    $cname = $_POST['knaam'];
    $email = $_POST['email'];
    $phonenumber = $_POST['tnum'];
    $country = $_POST['land'];
    $postcode = $_POST['postcode'];
    $huisnummer = $_POST['huisnummer'];
    $cid = $_POST['cid'];

    if (empty($cname) || empty($email) || empty($phonenumber) || empty($country) || empty($postcode) || empty($huisnummer) || empty($cid)) {
        if (empty($cname)) {
            echo "<span style='color: red;'>Please enter a Customer name</span>";
        }
        if (empty($email)) {
            echo "<span style='color: red'>Please enter a Email</span>";
        }
        if (empty($phonenumber)) {
            echo "<span style='color: red'>Please enter a phone number</span>";
        }
        if (empty($country)) {
            echo "<span style='color: red'>Please enter a country</span>";
        }
        if (empty($postcode)) {
            echo "<span style='color: red'>Please enter a zip code</span>";
        }

        if (empty($huisnummer)) {
            echo "<span style='color: red'>Please enter a House number</span>";
        }
        if (empty($cid)) {
            echo "<span style='color: red'>Please enter a customer id</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
        $result = mysqli_query($db, "INSERT INTO klant(klant_naam, email, telefoonnummer, land, postcode, huisnummer, klant_id) 
                                           values('$cname', '$email', '$phonenumber', '$country', '$postcode', '$huisnummer', '$cid')");

        echo "<span style='color: green;'>Room successfully added</span>";
        echo "<a href='index.php'>View result</a>";
    }
}

?>
