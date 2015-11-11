<?php
    require('scripts.php');

    session_start();
    if(isset($_GET['do']) AND $_GET['do'] == 'logout'){
        unset($_SESSION['admin']);
        session_destroy();
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
        <div class="form_box">
            <p class="main_color">Неотправленные:</p>
            <form action="success_update.php" method="post">
<?php
    $query = "SELECT id, card_id, name, phone FROM cards WHERE is_sent='0' ORDER BY id";
    $show_unsent = mysqli_query($cnn, $query);
    while ($row = mysqli_fetch_array($show_unsent)){
            echo "<label>";
            echo '<input type="checkbox" name='.$row['id'].">";
            echo '77700770'.$row['card_id']."<br>";
            echo $row['name']."<br>";
            echo $row['phone']."<br>"."<br>";
            echo "</label>";
?>
            <a href="edit.php?id=<?php echo $row['id']?>">Редактировать запись</a>
<?php  } 
?>
            <input type="submit" name='submit' class="btn_submit" value="Отметить как отправленные">
            </form>
            <a href="index.php">Ввести еще</a>
            <a href="show_unsent.php?do=logout">Выход</a>
        </div>
    </body>
    </html>