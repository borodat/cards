<?php
    define('DB_HOST', 'localhost');
    define('DB_LOGIN', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'budcentr_cards');
    
    $cnn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if(!$cnn){
        echo 'EROOR: cannot connect to the database.';
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
    <p class="success">Последние карточки:</p>
<?php
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