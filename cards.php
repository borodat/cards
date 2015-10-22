<?php
    function check_length($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $card_id = abs((int)$_POST['card_id']);
        $name = trim(strip_tags($_POST['name']));
        $phone = trim(strip_tags($_POST['phone']));
        
        if(!empty($card_id) && !empty($name) && !empty($phone)) {
            if(check_length($card_id, 5, 5) && check_length($name, 2, 50) && check_length($phone, 10, 13)) {
                echo "Спасибо за сообщение";
            } else { // добавили сообщение
                echo "Введенные данные некорректные";
            }
        } else { // добавили сообщение
            echo "Заполните пустые поля";
        }
        }
    echo "77700770" . $card_id . '<br>';
    echo $name . '<br>';
    echo $phone;
?>
<p><a href="index.php">Home</a></p>


<?php
//Проверяем, была ли форма отправлена
if(isset($_POST['submit-form'])){

   //Создаем массив, в который будем складывать ошибки
   $errors = array();

   //Проверяем указал ли пользователь имя
   if(empty($_POST['first-name']{
      $errors[] = "Пожалуйста, введите ваше имя";
   }else{
      $name = strip_tags($_POST['first-name']);
   }

   //Проверяем email адрес на корректность
   if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors[] = "Пожалуйста, введите корректный email адрес";
   }else{
      $email = $_POST['email'];
   }

   //Обрабатываем поле комментариев
   if(empty($_POST['comments'])){
      $errors[] = "Пожалуйста, введите комментарий";
   }else{
      $comment = strip_tags($_POST['comments']);
   }
}
?>