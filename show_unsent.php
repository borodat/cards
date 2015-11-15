<?php
    session_start();
    if(isset($_GET['do']) AND $_GET['do'] == 'logout'){
        unset($_SESSION['admin']);
        session_destroy();
    }

    if(!$_SESSION['admin']){
        header("Location: enter.php");
        exit;
    }
?>
        <div class="form_box">
            <h3 class="main_color">Неотправленные:</h3>
            <form action="index.php?page_id=success_sent" method="post">
<?php
    $query = "SELECT id, card_id, name, phone FROM cards WHERE is_sent='0' ORDER BY id";
    $show_unsent = mysqli_query($cnn, $query);
    while ($row = mysqli_fetch_array($show_unsent)){
            echo "<label class='edit_label'>";
            echo '<input type="checkbox" name='.$row['id'].">";
            echo '77700770'.$row['card_id']."<br>";
            echo $row['name']."<br>";
            echo $row['phone']."<br>"."<br>";
            echo "</label>";
    }
?>
           <label class='edit_label'><input type="checkbox" onchange="checkAll(this)" name="check_all" />ОТМЕТИТЬ ВСЕ<br><br></label>
            <input type="submit" name='submit' class="btn_submit" value="Отметить как отправленные">
            </form>
            <a href="index.php" class="grey">На главную</a>
            <a href="show_unsent.php?do=logout" class="grey">Выход</a>
        </div>
<script>
 //slect All script
function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
}
</script>