<?php
    function check_length($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $card_id = abs((int)$_POST['card_id']);
        $persona = trim(strip_tags($_POST['persona']));
        $phone = trim(strip_tags($_POST['phone']));
        
        if(!empty($card_id) && !empty($persona) && !empty($phone)) {
            if(check_length($card_id, 5, 5) && check_length($persona, 2, 50) && check_length($phone, 10, 13)) {
                echo "Спасибо за сообщение";
            } else { // добавили сообщение
                echo "Введенные данные некорректные";
            }
        } else { // добавили сообщение
            echo "Заполните пустые поля";
        }
        }
    echo "77700770" . $card_id . '<br>';
    echo $persona . '<br>';
    echo $phone;
?>
<p><a href="index.php">Home</a></p>