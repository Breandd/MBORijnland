<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 19:01
 */

include "../config.php";

$result = mysqli_query($db, "SELECT * FROM prijs ORDER BY id DESC");

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
        <td>price</td>
        <td>category code</td>
        <td>date</td>
        <td>action</td>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['prijs']."</td>";
        echo "<td>".$res['categorie_code']."</td>";
        echo "<td>".$res['datum']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
</html>
