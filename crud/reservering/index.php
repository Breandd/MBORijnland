<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 18-Jun-18
 * Time: 19:01
 */

include "../config.php";

$result = mysqli_query($db, "SELECT * FROM reservering ORDER BY id DESC");

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
        <td>Booking id</td>
        <td>customer id</td>
        <td>Room number</td>
        <td>Start date</td>
        <td>End date</td>
        <td>Payed</td>
        <td>action</td>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['reservering_id']."</td>";
        echo "<td>".$res['klant_id']."</td>";
        echo "<td>".$res['kamer_nummer']."</td>";
        echo "<td>".$res['begin_datum']."</td>";
        echo "<td>".$res['eind_datum']."</td>";
        echo "<td>".$res['betaald']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
</html>
