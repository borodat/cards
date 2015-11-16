<div class="form_box">   
<?php
    if(isset($_GET['page_id'])) {     
        if ($_GET['id'] == 'success_write') {
            echo '<h3 class="green_color">Данные записаны!</h3>';
        } elseif ($_GET['id'] == 'success_update'){
            echo "<h3 class='green_color'> Запись отредактирована!</h3>";
        }
    } else {
        echo '<h3 class="error">Данные не записаны!</h3>';
    }
?>
<p class="main_color"> Последние карточки:</p>
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