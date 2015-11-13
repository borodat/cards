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
    <nav class="main_nav">
        <ul>
            <li><a href="index.php?page=">Главная</a></li>
            <li><a href="index.php?page=">Все карточки</a></li>
            <li><a href="index.php?page=">Неотправленные</a></li>
            <li><a href="index.php?page=">Редактировать</a></li>
        </ul>
    </nav>
    <div class="form_box">
        <h3 class="main_color">Главная</h3>
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
            exit;
        }
        header('location: success.php?status=success');
        exit;
    }
?>
        <form action="index.php" method="post">
            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default"  value="77700770" disabled>
            <input type="text" class="rfield card_id" name="card_id"  placeholder="12345" maxlength="5" pattern="[0-9]{5}" required/>
            <label for="persona">ФИО клиента:</label>
            <input type="text" class="rfield" name="name" placeholder="Іванов І. І." pattern="^[А-Яа-яІіЇї\s\.]+$" maxlength="50" required/>
            <label for="user_phone">Номер телефона:</label>
            <input type="tel" class="rfield" name="phone" placeholder="0981112233" required maxlength="13" pattern="[0-9]{10,13}"/>
            <input type="submit" class="btn_submit" name="submit" value="Отправить данные" />
        </form>
        <a href="show_all.php" class="grey"> Все карточки</a>
        <a href="show_unsent.php" class="grey">Неотправленные</a>
        <a href="show_for_edit.php" class="grey">Редактировать</a>
    </div>
</body>
</html>