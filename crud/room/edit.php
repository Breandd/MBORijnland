<?php

include_once("../config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $knum = $_POST['knum'];
    $catcode = $_POST['catcode'];
    $rava = $_POST['rava'];

    if(empty($knum) || empty($catcode) || empty($rava)) {
        if(empty($knum)) {
            echo "<span style='color: red;'>Please enter a room number</span>";
        }

        if(empty($catcode)) {
            echo "<span style='color: red'>Please enter a Category code</span>";
        }

        if(empty($rava)) {
            echo "<span style='color: red'>Please enter if the room is available</span>";
        }
    } else {
        //updating the table
        $result = mysqli_query($db, "UPDATE `kamer` SET `Kamernummer`=$knum,`Categorie_Code`=$catcode,`Kamer_Beschikbaar`=$rava WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM kamer WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $knum = $res['Kamernummer'];
    $catcode = $res['Categorie_Code'];
    $rava = $res['Kamer_Beschikbaar'];
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
            <td>Room number</td>
            <td><input type="number" name="knum" value="<?php echo $knum;?>"></td>
        </tr>
        <tr>
            <td>Category Code</td>
            <td><input type="text" name="catcode" value="<?php echo $catcode;?>"></td>
        </tr>
        <tr>
            <td>Room availability</td>
            <td><input type="text" name="rava" value="<?php echo $rava;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>