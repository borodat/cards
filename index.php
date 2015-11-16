<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="grey">Главная</a></li>
            <li><a href="index.php?page_id=all" class="grey">Все карточки</a></li>
            <li><a href="index.php?page_id=unsent" class="grey">Неотправленные</a></li>
            <li><a href="index.php?page_id=edit" class="grey">Редактировать</a></li>
            <li><a href="../orders/" class="green">Заказы</a></li>
        </ul>
    </nav>
<?php
    require('scripts.php');
?>

<?php
if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
    switch ($page_id){
    case "all":
        require('show_all.php');
        break;
    case "unsent":
        require('show_unsent.php');
        break;
    case "edit":
        require('show_for_edit.php');
        break;
    case "edit_page":
        require('edit.php');
        break;
    case "success":
        require('success.php');
        break;
    case "success_sent":
        require('success_sent.php');
        break;
    }
   
} else {// если page_id не указан грузим главную
?>
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
        header('location: index.php?page_id=success&id=success_write');
        exit;
    }
?>
        <form action="index.php" method="post">
            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default"  value="77700770" disabled>
            <input type="text" class="rfield card_id" name="card_id"  placeholder="12345" maxlength="5" pattern="[0-9]{5}" required/>
            <label for="persona">ФИО клиента:</label>
            <input type="text" class="rfield" name="name" placeholder="Іванов І. І." pattern="^[А-Яа-яІіЇїЄє\s\.]+$" maxlength="50" required/>
            <label for="user_phone">Номер телефона:</label>
            <input type="tel" class="rfield" name="phone" placeholder="0981112233" required maxlength="10" pattern="[0-9]{10,13}"/>
            <input type="submit" class="btn_submit" name="submit" value="Отправить данные" />
        </form>
        
    </div>
<?php }// конец елс?>
</body>
</html>