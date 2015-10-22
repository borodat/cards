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
        <form action="cards.php" method="post" class="rf">

            <label for="card_id">Номер карточки:</label>
            <input type="text" class="card_default" id="card_default" value="77700770" disabled>
            <input type="text" class="rfield card_id" id="card_id"  placeholder="12345"/>

            <label for="user_family">ФИО клиента:</label>
            <input type="text" class="rfield" id="user_family" placeholder="Иванов И. И."/>

            <label for="user_phone">Телефон пользователя:</label>
            <input type="text" class="rfield" id="user_phone" placeholder="0981112233"/>

            <input type="submit" class="btn_submit disabled" value="Отправить данные" />

        </form>
    </div>   
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        (function( $ ){

            $(function() {

              $('.rf').each(function(){
                // Объявляем переменные (форма и кнопка отправки)
                var form = $(this),
                    btn = form.find('.btn_submit');

                // Добавляем каждому проверяемому полю, указание что поле пустое
                form.find('.rfield').addClass('empty_field');

                // Функция проверки полей формы
                function checkInput(){
                  form.find('.rfield').each(function(){
                    if($(this).val() != ''){
                      // Если поле не пустое удаляем класс-указание
                    $(this).removeClass('empty_field');
                    } else {
                      // Если поле пустое добавляем класс-указание
                    $(this).addClass('empty_field');
                    }
                  });
                }

                // Функция подсветки незаполненных полей
                function lightEmpty(){
                  form.find('.empty_field').css({'border-color':'#d8512d'});
                  // Через полсекунды удаляем подсветку
                  setTimeout(function(){
                    form.find('.empty_field').removeAttr('style');
                  },500);
                }

                // Проверка в режиме реального времени
                setInterval(function(){
                  // Запускаем функцию проверки полей на заполненность
                  checkInput();
                  // Считаем к-во незаполненных полей
                  var sizeEmpty = form.find('.empty_field').size();
                  // Вешаем условие-тригер на кнопку отправки формы
                  if(sizeEmpty > 0){
                    if(btn.hasClass('disabled')){
                      return false
                    } else {
                      btn.addClass('disabled')
                    }
                  } else {
                    btn.removeClass('disabled')
                  }
                },500);

                // Событие клика по кнопке отправить
                btn.click(function(){
                  if($(this).hasClass('disabled')){
                    // подсвечиваем незаполненные поля и форму не отправляем, если есть незаполненные поля
                    lightEmpty();
                    return false
                  } else {
                    // Все хорошо, все заполнено, отправляем форму
                    form.submit();
                  }
                });
              });
            });

            })( jQuery );
    </script>
</body>
</html>