<?php
include_once("../config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $roomcat = $_POST['rocat'];
    $catname = $_POST['catname'];
    $catprice = $_POST['catprice'];
    $maxp = $_POST['maxp'];

// checking empty fields
    if (empty($roomcat) || empty($catname) || empty($catprice) || empty($maxp)) {
        if (empty($roomcat)) {
            echo "<span style='color: red;'>Please enter a room category</span>";
        }
        if (empty($catname)) {
            echo "<span style='color: red'>Please enter a Category name</span>";
        }
        if (empty($catprice)) {
            echo "<span style='color: red'>Please enter the room price</span>";
        }
        if (empty($maxp)) {
            echo "<span style='color: red'>Please enter the maximum number of people for the designated category</span>";
        }

        echo '<br/><a href="javascript:self.history.back()">Go back</a>';
    } else {
//updating the table
        $result = mysqli_query($db, "UPDATE kamer_categorie SET categorie_code='$roomcat',categorie_naam='$catname',categorieprijs='$catprice', categorie_maxp='$maxp' WHERE id=$id");

//redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM kamer_categorie WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $roomcat = $res['categorie_code'];
    $catname = $res['categorie_naam'];
    $catprice = $res['categorieprijs'];
    $maxp = $res['categorie_maxp'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Room Category</td>
            <td><input type="text" name="rocat" value="<?php echo $roomcat; ?>"></td>
        </tr>
        <tr>
            <td>Category name</td>
            <td><input type="text" name="catname" value="<?php echo $catname; ?>"></td>
        </tr>
        <tr>
            <td>Category price</td>
            <td><input type="number" name="catprice" value="<?php echo $catprice; ?>"></td>
        </tr>
        <tr>
            <td>Category max people</td>
            <td><input type="number" name="maxp" value="<?php echo $maxp; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>