<div class="request_container">
    <?
        if($_COOKIE['temp_user_request']==1){
            echo "<h1 class='headers'>Вы отправили заявку на подбор тура!</h1>";
        }else{
    ?>
    <div class="request_form">
        <form action="index.php?act=Request" method="POST" id="request_form">
            <h1>Подбор тура</h1>
            <hr id="request_horizontal_hr">
            <input type="text" name="name" placeholder="Ваше имя" class="first_request_input">
            <input type="text" name="last_name" placeholder="Фамилия" class="request_input">
            <input type="text" name="phone" placeholder="Телефон" class="request_input">
            <select name="type" id="request_input_select">
                <option value="Не выбрано" autofocus>Не выбрано</option>
                <option value="Туры по России">Туры по России</option>
                <option value="Туры зарубеж">Зарубежные туры</option>
                <option value="Экскурсионные туры">Экскурсонные туры</option>
                <option value="Морские и речные круизы">Морские и речные круизы</option>
                <option value="Другое">Другое</option>
            </select>
            <textarea name="text" placeholder="Опишите ваши пожелания" class="request_textarea"></textarea>
            <input type="submit" value="Оставить заявку" class="request_submit">
        </form>
        <div class="errors_request">
        <?
            $request_array = $_POST;
            $request = new M_Model;
            $request->getRequestForm($request_array);
        ?>
        </div>
    </div>
    <div class="request_info">
        <ul>
            <li>1) Заполните форму и мы перезвоним вам в течении дня</li>
            <li>2) В блоке "Опишите ваши пожелания" желательно написать примерную страну, отель или ориентировочную цену(если хотите обсудить это лично с тур-оператором тогда оставьте только главные пожелания)</li>
        </ul>
    </div>
    <?
        }
    ?>
</div>