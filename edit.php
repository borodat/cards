<div class="form_box">
<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $show_all = mysqli_query($cnn, "SELECT id, card_id, name, phone FROM cards WHERE id='$id'");
        $row = mysqli_fetch_array($show_all);
?>
    <form action="index.php?page_id=edit_page&id=<?php echo $id;?>" method="post">
        <label for="card_id">Номер карточки:</label>
        <input type="text" class="card_default"  value="77700770" disabled>
        <input type="text" class="rfield card_id" name="card_id" value="<?php echo $row['card_id']?>"  maxlength="5" pattern="[0-9]{5}" required/>
        <label for="persona">ФИО клиента:</label>
        <input type="text" class="rfield" name="name"value="<?php echo $row['name']?>" pattern="^[А-Яа-яІіЇїЄє\s\.]+$" maxlength="50" required/>
        <label for="user_phone">Номер телефона:</label>
        <input type="tel" class="rfield" name="phone" value="<?php echo $row['phone']?>" required maxlength="10" pattern="[0-9]{10,13}"/>
        <input type="submit" class="btn_submit" name="update" value="Редактировать данные" />
    </form>
<?php
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
        header("Location: index.php?page_id=success&id=success_update");;
        exit;
    }
    mysqli_close($cnn);
?>
</div>