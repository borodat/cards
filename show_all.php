<?php
    require('scripts.php');

    session_start();
    if(isset($_GET['do'])){
        if($_GET['do'] == 'logout'){
            unset($_SESSION['admin']);
            session_destroy();
        }
    }
    if(!$_SESSION['admin']){
        header("Location: enter.php");
        exit;
    }
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
        <caption class="success"><a href="index.php">На главную</a></caption>
        <caption class="success">Все карточки:</caption>
        <tr><th>ID</th><th>Реквизиты</th><th>Дата</th></tr>
<?php
    $show_all = mysqli_query($cnn, "SELECT id, card_id, name, phone, date FROM cards ORDER BY id DESC");
    while ($row = mysqli_fetch_array($show_all)){
        echo "<tr>";
            echo "<td>";
            echo $row['id']."<br>";
            echo "</td>";
            echo "<td>";
            echo '77700770'.$row['card_id']."<br>";
            echo $row['name']."<br>";
            echo $row['phone'];
            echo "</td>";
            echo "<td>";
            echo $row['date'];
            echo "</td>";
        echo "</tr>";
    }
    mysqli_close($cnn);
?>
    </table>
    <div class="form_box">
        <a href="index.php">На главную</a>
        <a href="show_all.php?do=logout">Выход</a>
    </div>
</body>
</html>