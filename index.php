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
        <form action="index.php" method="post">

            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default"  value="77700770" disabled>
            <input type="text" class="rfield card_id" name="card_id"  placeholder="12345" maxlength="5" pattern="[0-9]{5}" required/>

            <label for="persona">ФИО клиента:</label>
            <input type="text" class="rfield" name="name" placeholder="Іванов І. І." pattern="^[А-Яа-яІіЇї\s\.]+$" maxlength="50" required/>

            <label for="user_phone">Номер телефона:</label>
            <input type="tel" class="rfield" name="phone" placeholder="0981112233" required maxlength="13" pattern="[0-9]{10,13}"/>

            <input type="submit" class="btn_submit" name="submit" value="Отправить данные" />
            <a href="card.html" class="btn_submit">Посмотреть</a>

        </form>
    </div>
<p>
<?php
    $errors = array(); 
    
    if(isset($_POST['submit'])){
        $card_id = isset($_POST['card_id']) ? (int)strip_tags($_POST['card_id']) : null;
        $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;
        
        
        $text = "77700770$card_id <br>"; 
        $text .= "$name <br>"; 
        $text .= "$phone <br><br>";
        
        $file = fopen ("card.html", "a+"); //открываем для перезаписи файл message.txt лежаший в одной папке с текущей страницей      
        fwrite ($file,$text); // пишем в файл
        fclose ($file); // закрываем файл
        header("Location: ".$_SERVER['REQUEST_URI']);
           //Check the name and make sure that it isn't a blank/empty string.
        
        if(strlen(trim($name)) === 0){
            //Blank string, add error to $errors array.
            $errors[] = "You must enter your name!";
        }

        if(!empty($errors)){ 
        echo '<h1>Error(s)!</h1>';
            foreach($errors as $errorMessage){
                echo $errorMessage . '<br>';
            }
        }
    }
?>

</p>
</body>
</html>