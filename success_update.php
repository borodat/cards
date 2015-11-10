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
        <div class="form_box">
<!--            <h3 class="success">Данные записаны!</h3>-->
<?php
    if(isset($_POST['submit'])){
        foreach ($_POST as $k => $v) {
             if ($v == "on") {
                 $query_update = "UPDATE cards SET is_sent='1' WHERE id='$k'";
                 $update_sent = mysqli_query($cnn, $query_update);
                 echo "Запись №: ". $k. " отправленна ";
             }else if($k == "submit"){
                 continue;
             }else {
                 echo "Ничего не записано!";
             }
        }

        mysqli_close($cnn);
    }
   
?>
            <a href="index.php">Ввести еще</a>
        </div>
    </body>

    </html>