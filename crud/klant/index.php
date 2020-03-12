<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 19:01
 */

include "../config.php";

$result = mysqli_query($db, "SELECT * FROM klant ORDER BY id DESC");

?>

<html>
<head>
    <title>Room</title>
</head>
<body>
<a href="create.html">Add a room</a>
<table width="80%" border="0">
    <tr bgcolor="#ccc">
        <td>ID</td>
        <td>Klant naam</td>
        <td>Email</td>
        <td>telefoonnummer</td>
        <td>Land</td>
        <td>Postcode</td>
        <td>Huisnummer</td>
        <td>Klant id</td>
        <td>Action</td>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['klant_naam']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td>".$res['telefoonnummer']."</td>";
        echo "<td>".$res['land']."</td>";
        echo "<td>".$res['postcode']."</td>";
        echo "<td>".$res['huisnummer']."</td>";
        echo "<td>".$res['klant_id']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
</html>
