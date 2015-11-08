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
    <h3 class="success">Данные записаны!</h3>
    <p class="success"> Последние карточки:</p>
<?php
    if(isset($_POST['submit'])){     
        $card_id = isset($_POST['card_id']) ? (int)strip_tags($_POST['card_id']) : null;//Принимаем форму
        $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;
        $card_id = mysqli_real_escape_string($cnn, $card_id);//Экранируем спец. символы
        $name = mysqli_real_escape_string($cnn, $name);
        $phone = mysqli_real_escape_string($cnn, $phone);
        
        $data = "INSERT INTO cards (card_id, name, phone) VALUES ('$card_id', '$name', '$phone')";
        $sql = mysqli_query($cnn, $data);
        if( !$sql ){
            echo mysqli_error($cnn);
        }
    } else {
        echo "Ошибка";
    }
    $last_card = mysqli_query($cnn, "SELECT card_id, name, phone FROM cards ORDER BY id DESC LIMIT 2");
    while ($row = mysqli_fetch_array($last_card)){
        echo "Номер: ".'77700770'.$row['card_id']."<br>";
        echo "ФИО: ".$row['name']."<br>";
        echo "Номер телефона: ".$row['phone']."<br>"."<br>";
    }
    mysqli_close($cnn);
?>
    <a href="index.php">Ввести еще</a>
    </div>
</body>
</html>