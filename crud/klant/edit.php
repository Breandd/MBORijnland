<?php
include_once("../config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $cname = $_POST['knaam'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $country = $_POST['land'];
    $postcode = $_POST['postcode'];
    $huisnummer = $_POST['huisnummer'];
    $cid = $_POST['cid'];

// checking empty fields
    if (empty($cname) || empty($email) || empty($phonenumber) || empty($country) || empty($postcode) || empty($huisnummer) || empty($cid)) {
        if (empty($cname)) {
            echo "<span style='color: red;'>Please enter a Customer Name</span>";
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
            echo "<span style='color: red'>Please enter a zipcode</span>";
        }
        if (empty($huisnummer)) {
            echo "<span style='color: red'>Please enter a housenumber</span>";
        }
        if (empty($cid)) {
            echo "<span style='color: red'>Please enter a customer id</span>";
        }
        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
//updating the table
        $result = mysqli_query($db, "UPDATE klant SET klant_naam='$cname',email='$email',telefoonnummer='$phonenumber',land='$country',postcode='$postcode',huisnummer='$huisnummer',klant_id='$cid' WHERE id=$id");

//redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM klant WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $cname = $res['klant_naam'];
    $email = $res['email'];
    $phonenumber = $res['telefoonnummer'];
    $country = $res['land'];
    $postcode = $res['postcode'];
    $huisnummer = $res['huisnummer'];
    $cid = $res['klant_id'];
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
            <td><input type="text" name="knaam" value="<?php echo $cname; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>"></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" name="land" value="<?php echo $country; ?>"></td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td><input type="text" name="postcode" value="<?php echo $postcode; ?>"></td>
        </tr>
        <tr>
            <td>Huisnummer</td>
            <td><input type="number" name="huisnummer" value="<?php echo $huisnummer; ?>"></td>
        </tr>
        <tr>
            <td>Customer id</td>
            <td><input type="text" name="cid" value="<?php echo $cid; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>