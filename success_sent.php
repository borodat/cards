<div class="form_box">
<?php
    if(isset($_POST['submit'])){
        foreach ($_POST as $k => $v) {
            if($k == "submit" or $k=="check_all"){
                 continue; 
            } elseif ($v == "on") {
                 $query_update = "UPDATE cards SET is_sent='1' WHERE id='$k'";
                 $update_sent = mysqli_query($cnn, $query_update);
                 echo "<p class='success'>Запись №: ". $k. " отправленна </p>";
             
            } else { echo "<p class='error'>Ничего не записано! </p>"; }
        }
        mysqli_close($cnn);
    }
?>
<a href="index.php">Ввести еще</a>
</div>