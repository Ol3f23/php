<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['_method'] == "DELETE") {
                $user_id = $_POST['user'];
                $usun = $conn->query("DELETE FROM biblioteka_filmów WHERE `biblioteka_filmów`.`id` = $user_id");
            } elseif ($_POST['_method'] == "ADD") {
                $tytul = $_POST['tytul'];
                $rezyser = $_POST['rezyser'];
                $data_premiery = $_POST['data_premiery'];
                $dodaj = $conn->query("INSERT INTO `biblioteka_filmów` (`id`, `tytul`, `rezyser`, `data_premiery`) VALUES (NULL, '$tytul', '$rezyser', '$data_premiery');");
            }
        }
        
        mysqli_query($conn, 'SET NAMES utf8');
        $pytanie = $conn->query("SELECT * FROM `biblioteka_filmów`");
 
 
 
        echo "<table>";
        echo "<tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Reżyser</th>
                    <th>Data premiery</th>
                </tr>";
 
        while ($row = mysqli_fetch_array($pytanie)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['TYTUL'] . "</td>";
            echo "<td>" . $row['REZYSER'] . "</td>";
            echo "<td>" . $row['DATA_PREMIERY'] . "</td>";
 
            echo '<td>
                    <form action="" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="user" value=' . $row['id'] . '>
                        <button type="submit">Usuń</button>
                    </form>
                  </td>';
 
 
            echo "</tr>";
        }
        echo '<tr>
                <form action="" method="POST" >
                    <input type="hidden" name="_method" value="ADD">
                    <td>Film</td>
                    <td><input type="text" name="tytul" required></td>
                    <td><input type="text" name="rezyser"></td>
                    <td><input type="date" name="data_premiery"></td>
                    <td><button type="submit">Dodaj</button></td>
                </form>
 
 
            </tr>';
        echo "</table>";
?>
</body>
</html>