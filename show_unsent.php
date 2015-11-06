<?php
    require('scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <caption class="success">Неотправленные:</caption>
<?php
    $show_unsent = mysqli_query($cnn, "SELECT card_id, name, phone FROM cards WHERE is_sent='1' ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_unsent)){
        echo "<tr>";
            echo "<td>";
            echo '77700770'.$row['card_id']."<br>";
            echo $row['name']."<br>";
            echo $row['phone'];
            echo "</td>";
        echo "</tr>";
    }
    mysqli_close($cnn);
?>
    </table>
    <div class="form_box">
        <a href="index.php">Ввести еще</a>
    </div>
</body>
</html>