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
       
<?php
  function show_form($card_id, $persona) {
?>
        <form action="cards.php" method="post" class="rf">

            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default"  value="77700770" disabled>
            <input type="text" class="rfield card_id" name="card_id" value="<?php print $card_id ?>" placeholder="12345"/>

            <label for="persona">ФИО клиента:</label>
            <input type="text" class="rfield" name="persona" value="<?php print $persona ?>" placeholder="Иванов И. И."/>

            <label for="user_phone">Телефон пользователя:</label>
            <input type="text" class="rfield" name="phone" placeholder="0981112233"/>

            <input type="submit" class="btn_submit" value="Отправить данные" />

        </form>

<?php
  }
  function check_form($card_id, $persona) {
    if(!$card_id || !$persona):
      print("Вы не заполнили нужные поля!<br>");
    if(!$card_id) {
      print("Введите Ваше имя.<br>");
    }
    if(!$persona) {
      print("Введите ваш e-mail.<br>");
    }
    show_form($card_id, $persona);
    else:
      confirm_form($card_id, $persona);
    endif;
  }
  function confirm_form($card_id, $persona) {
  ?>
    <h2>Введенная Вами информация:</h2>
  <?php
    print("<br>$card_id<br>$persona\n");
  }
  if(!$submit){
  ?>
  <p>Введите информацию о себе</p>
  <p>Все поля обязательны для заполнения.<p>
  <?php
    show_form($card_id, $persona);
  } else {
    check_form($card_id, $persona);
  }
?>

    </div>
</body>
</html>