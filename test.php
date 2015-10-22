<html>
<head>
  <title>Форма с обязательным заполнением полей</title>
</head>
<body>
<?php
  function show_form($l_name, $email) {
  ?>
  <form action="test.php" method="post">
    Ваше имя *<input type="text" name="l_name" value="<?php print $l_name ?>"><br>
    E-mail*<input type="text" name="email" value="<?php print $email ?>"><br>
  <input type="submit" name="submit" value="Отправить!"><input type="Reset">
  </form>
  <?php
  }
  function check_form($l_name, $email) {
    if(!$l_name || !$email):
      print("Вы не заполнили нужные поля!<br>");
    if(!$l_name) {
      print("Введите Ваше имя.<br>");
    }
    if(!$email) {
      print("Введите ваш e-mail.<br>");
    }
    show_form($l_name, $email);
    else:
      confirm_form($l_name, $email);
    endif;
  }
  function confirm_form($l_name, $email) {
  ?>
    <h2>Введенная Вами информация:</h2>
  <?php
    print("<br>$l_name<br>$email\n");
  }
  if(!$submit):
  ?>
  <p>Введите информацию о себе</p>
  <p>Все поля обязательны для заполнения.<p>
  <?php
    show_form("", "");
  else:
    check_form($l_name, $email);
  endif;
  ?>
</body>
</html>