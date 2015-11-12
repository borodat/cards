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
            <h3 class="main_color">Редактировать:</h3>
<?php
    $query = "SELECT id, card_id, name, phone FROM cards WHERE is_sent='0' ORDER BY id  DESC";
    $show_unsent = mysqli_query($cnn, $query);
    while ($row = mysqli_fetch_array($show_unsent)){
            echo "<div class='edit_label'>";
            echo '77700770'.$row['card_id']."<br>";
            echo $row['name']."<br>";
            echo $row['phone']."<br>"."<br>";
?>
           </div>
            <a href="edit.php?id=<?php echo $row['id']?>" class="edit_button">Редактировать</a>
        
<?php  
    } 
?>
            <input type="submit" name='submit' class="btn_submit" value="Отметить как отправленные">
            <a href="index.php" class="grey">На главную</a>
            <a href="show_unsent.php?do=logout" class="grey">Выход</a>
        </div>
    </body>
    </html>