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
    $reservering_id = $_POST['reservering_id'];
    $klant_id = $_POST['klant_id'];
    $kamer_nummer = $_POST['kamer_nummer'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $payed = $_POST['payed'];

    if (empty($reservering_id) || empty($klant_id) || empty($kamer_nummer) || empty($startdate) || empty($enddate) || empty($payed)) {
        if (empty($reservering_id)) {
            echo "<span style='color: red;'>Please enter a Booking id</span>";
        }
        if (empty($klant_id)) {
            echo "<span style='color: red'>Please enter a customer id</span>";
        }
        if (empty($kamer_nummer)) {
            echo "<span style='color: red'>Please enter a Room number</span>";
        }
        if (empty($startdate)) {
            echo "<span style='color: red'>Please enter a starting date</span>";
        }
        if (empty($enddate)) {
            echo "<span style='color: red'>Please enter a end date</span>";
        }
        if (empty($payed)) {
            echo "<span style='color: red'>Please enter wether the room is payed or not</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
        $result = mysqli_query($db, "INSERT INTO reservering(reservering_id, klant_id, kamer_nummer, begin_datum, eind_datum, betaald) 
                                           values('$reservering_id', '$klant_id', '$kamer_nummer', '$startdate', '$enddate', '$payed')");

        echo "<span style='color: green;'>Room successfully added</span>";
        echo "<a href='index.php'>View result</a>";
    }
}

?>
