<?php
    define('DB_HOST', 'localhost');
    define('DB_LOGIN', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'budcentr_cards');
    
    $cnn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    
    if(!$cnn){
        echo 'EROOR: cannot connct to database.';
    }
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
        </form>
    </div>
    <div class="form_box">
<?php
    $errors = array(); 
    
    if(isset($_POST['submit'])){
        $card_id = isset($_POST['card_id']) ? (int)strip_tags($_POST['card_id']) : null;
        $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;
        
        $sql = mysqli_query($cnn, "INSERT INTO cards (card_id, name, phone) VALUES ('$card_id', '$name', '$phone')");
        if( !$sql ){
            echo mysqli_error($cnn);
        }
        
        $last_card = mysqli_query($cnn, "SELECT card_id, name, phone FROM cards ORDER BY id DESC LIMIT 2");
        
        while ($row = mysqli_fetch_array($last_card)){
            echo "Номер: ".'77700770'.$row['card_id']."<br>";
            echo "ФИО: ".$row['name']."<br>";
            echo "Номер телефона: ".$row['phone']."<br>"."<br>";
        }
        mysqli_close($cnn);
        header("Location: success.php");
//        $text = "77700770$card_id <br>"; 
//        $text .= "$name <br>"; 
//        $text .= "$phone <br><br>";
//        
//        $file = fopen ("card.html", "a+");
//        fwrite ($file,$text);
//        fclose ($file);
////        header("Location: ".$_SERVER['REQUEST_URI']);
//        
//        //Check the name and make sure that it isn't a blank/empty string.      
//        if(strlen(trim($name)) === 0){
//            //Blank string, add error to $errors array.
//            $errors[] = "You must enter your name!";
//        }
//        if(!empty($errors)){ 
//        echo '<h1>Error(s)!</h1>';
//            foreach($errors as $errorMessage){
//                echo $errorMessage . '<br>';
//            }
//        }
    }
?>
    </div>
</body>
</html>