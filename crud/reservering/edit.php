<?php
include_once("../config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $reservering_id = $_POST['reservering_id'];
    $klant_id = $_POST['klant_id'];
    $kamer_nummer = $_POST['kamer_nummer'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $payed = $_POST['payed'];


// checking empty fields
    if (empty($reservering_id) || empty($klant_id) || empty($kamer_nummer) || empty($startdate) || empty($enddate) || empty($payed)) {
        if (empty($reservering_id)) {
            echo "<span style='color: red;'>Please enter a Booking id</span>";
        }
        if (empty($klant_id)) {
            echo "<span style='color: red'>Please enter a Customer id</span>";
        }
        if (empty($kamer_nummer)) {
            echo "<span style='color: red'>Please enter a Room number</span>";
        }
        if (empty($startdate)) {
            echo "<span style='color: red'>Please enter a Start date</span>";
        }
        if (empty($enddate)) {
            echo "<span style='color: red'>Please enter a end date</span>";
        }
        if (empty($payed)) {
            echo "<span style='color: red'>Please enter wether the room is payed or not</span>";
        }
        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
//updating the table
        $result = mysqli_query($db, "UPDATE reservering SET reservering_id='$reservering_id',klant_id='$klant_id',kamer_nummer='$kamer_nummer', begin_datum='$startdate', eind_datum='$enddate', betaald='$payed' WHERE id=$id");

//redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM reservering WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $id = $res['id'];
    $reservering_id = $res['reservering_id'];
    $klant_id = $res['klant_id'];
    $kamer_nummer = $res['kamer_nummer'];
    $startdate = $res['begin_datum'];
    $enddate = $res['eind_datum'];
    $payed = $res['betaald'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="editform" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Customer name</td>
            <td><input type="number" name="reservering_id" value="<?php echo $reservering_id; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="klant_id" value="<?php echo $klant_id; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="number" name="kamer_nummer" value="<?php echo $kamer_nummer; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="date" name="startdate" value="<?php echo $startdate; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="date" name="enddate" value="<?php echo $enddate; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="number" name="payed" value="<?php echo $payed; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>