<?php
include_once("../config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $price = $_POST['price'];
    $code = $_POST['categorie_code'];
    $date = $_POST['date'];


// checking empty fields
    if (empty($price) || empty($code) || empty($date)) {
        if (empty($price)) {
            echo "<span style='color: red;'>Please enter a price</span>";
        }
        if (empty($code)) {
            echo "<span style='color: red'>Please enter a Category code</span>";
        }
        if (empty($date)) {
            echo "<span style='color: red'>Please enter a date</span>";
        }
        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
//updating the table
        $result = mysqli_query($db, "UPDATE prijs SET prijs='$price',categorie_code='$code',datum='$date' WHERE id=$id");

//redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM prijs WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $id = $res['id'];
    $price = $res['prijs'];
    $code = $res['categorie_code'];
    $date = $res['datum'];
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
            <td><input type="number" step="0.01" name="price" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="categorie_code" value="<?php echo $code; ?>"></td>
        </tr>
        <tr>
            <td>Phonenumber</td>
            <td><input type="date" name="date" value="<?php echo $date; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>