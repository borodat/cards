<?php
    require('scripts.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form_box">

<?php
    
    if(isset($_GET['id']) AND $_GET['id']!=='success') {
        $id = $_GET['id'];
        $show_all = mysqli_query($cnn, "SELECT id, card_id, name, phone FROM cards WHERE id='$id'");
        $row = mysqli_fetch_array($show_all);
?>
     <form action="edit.php?id=<?php echo $id;?>" method="post">
            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default"  value="77700770" disabled>
            <input type="text" class="rfield card_id" name="card_id" value="<?php echo $row['card_id']?>"  maxlength="5" pattern="[0-9]{5}" required/>
            <label for="persona">ФИО клиента:</label>
            <input type="text" class="rfield" name="name"value="<?php echo $row['name']?>" pattern="^[А-Яа-яІіЇї\s\.]+$" maxlength="50" required/>
            <label for="user_phone">Номер телефона:</label>
            <input type="tel" class="rfield" name="phone" value="<?php echo $row['phone']?>" required maxlength="10" pattern="[0-9]{10,13}"/>
            <input type="submit" class="btn_submit" name="update" value="Редактировать данные" />
    </form>
<?php
    } elseif(isset($_GET['id']) AND $_GET['id']=='success'){
        echo "<h3 class='green_color'> Запись отредактирована!</h3>";
    } else {echo "<p class='error'> id не передан.</p>";}
?>
<?php
if(isset($_POST['update'])){
        $card_id = isset($_POST['card_id']) ? (int)strip_tags($_POST['card_id']) : null;//Принимаем форму
        $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;
        $card_id = mysqli_real_escape_string($cnn, $card_id);//Экранируем спец. символы
        $name = mysqli_real_escape_string($cnn, $name);
        $phone = mysqli_real_escape_string($cnn, $phone);
        
        $data = "UPDATE cards SET card_id='$card_id', name='$name', phone='$phone' WHERE id='$id'";
        $sql = mysqli_query($cnn, $data);
        if( !$sql ){
            echo mysqli_error($cnn);
            exit;
        }
        header("Location: edit.php?id=success");;
        exit;
    }
     mysqli_close($cnn);
?>
        <a href="index.php?page_id=all" class="grey">Показать все карточки</a>
        <a href="index.php?page_id=unsent" class="grey">Показать неотправленные</a>
    </div>
</body>
</html>