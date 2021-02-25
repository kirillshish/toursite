<div class="request_container">
    <div class="make_request">
        <div class="request_form">
            <form action="index.php?act=Request" method="POST" id="request_form">
                <h1>Подбор тура</h1>
                <hr id="request_horizontal_hr">
                <input type="text" name="name" placeholder="Ваше имя" class="first_request_input" value="<?=$_SESSION['name']?>">
                <input type="text" name="last_name" placeholder="Фамилия" class="request_input">
                <input type="text" name="phone" placeholder="Телефон" class="request_input" value="<?=$_SESSION['phone']?>">
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
                $request->checkRequest($request_array);
                $_POST=null;
            ?>
            </div>
        </div>
        <div class="request_info">
            <ul>
                <li>1) Заполните форму и мы перезвоним вам в течении дня</li>
                <li>2) В блоке "Опишите ваши пожелания" желательно написать примерную страну, отель или ориентировочную цену(если хотите обсудить это лично с тур-оператором тогда оставьте только главные пожелания)</li>
            </ul>
        </div>
    </div>
    <div class="show_requests">
        <h3>Заявки на подбор тура</h3>
        <?
            $show_requests = new M_User;
            $array_requests = $show_requests->showRequests();
            $count = count($array_requests);
            if($array_requests){ 
                for($i=0;$i<$count;$i++){
                    $simple_request = $array_requests[$i]
                    ?>
                    <div class="request">
                        <a href="index.php?act=Request&idToDelete=<?=$simple_request['request_id']?>" class="href_cross"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABOElEQVRIie2UMU4CURRFz/0zLoFJ6C0ggQ0QRqJxAxZ2QGIJC6LVws7EFYiRsARIJMGeIWxhhmdFosDMfBMTLbjtf/+el//u+3DSv9S6Gw+SXivyrU96rWjdjQfHztyBeb89RDYSbuwDSXqtSLgxstG63x6WAraBnhAzoAFusunG1Tzz1V1ckdwL0DBYyIXP+zXKu+gyG2M0DRaB6aryOF0V1bggvIwe3hIvQBnE17wQkAdJz0h9zUsB+xCkpbDUjLqPuRdgB1FmExl1AEwfCoO4zByOpChX9r0tpZlXc6WA3RMJ6piWEu9g55nstSjCXoD9ISsMLrJAHcRMUPOBeMf060B99qQQ4JNzX8gB4CdL5AM5mIHL7BajCcxh2ymKYvV+ujHbXgNzQW3r7Cav9pt+87s+6e/1CRK156E6NCneAAAAAElFTkSuQmCC"></a>
                        <?
                        if($_GET['idToDelete']){
                            $show_requests->deleteSimpleRequest();
                        }
                        ?>
                        <a href="index.php?act=Product_Request&id=<?=$simple_request['request_id']?>&request=1" class="request_content">
                            <p>Заявка номер: <span class="strong_span"><?=$simple_request['request_id']?></span></p>
                            <p>Тип тура: <span class="strong_span"><?=$simple_request['type']?></span></p>
                        </a>
                    </div>
                <?}
            }else{
                echo "У вас нет заявок на подбор тура";
            }
        ?>
    </div>
    <div class="show_bookings">
           <h3>Бронирование туров</h3>
           <?
            $array_bookings = $show_requests->showBookings();
            if($array_bookings){
                $count1 = count($array_bookings);
                for($k=0;$k<$count1;$k++){
                    $simple_booking = $array_bookings[$k];
                    ?>
                <div class="booking">
                        <a href="index.php?act=Request&idToDelete=<?=$simple_booking['order_id']?>" class="href_cross"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABOElEQVRIie2UMU4CURRFz/0zLoFJ6C0ggQ0QRqJxAxZ2QGIJC6LVws7EFYiRsARIJMGeIWxhhmdFosDMfBMTLbjtf/+el//u+3DSv9S6Gw+SXivyrU96rWjdjQfHztyBeb89RDYSbuwDSXqtSLgxstG63x6WAraBnhAzoAFusunG1Tzz1V1ckdwL0DBYyIXP+zXKu+gyG2M0DRaB6aryOF0V1bggvIwe3hIvQBnE17wQkAdJz0h9zUsB+xCkpbDUjLqPuRdgB1FmExl1AEwfCoO4zByOpChX9r0tpZlXc6WA3RMJ6piWEu9g55nstSjCXoD9ISsMLrJAHcRMUPOBeMf060B99qQQ4JNzX8gB4CdL5AM5mIHL7BajCcxh2ymKYvV+ujHbXgNzQW3r7Cav9pt+87s+6e/1CRK156E6NCneAAAAAElFTkSuQmCC"></a>
                        <?
                        if($_GET['idToDelete']){
                            $show_requests->deleteSimpleBooking();
                        }
                        ?>
                        <a href="index.php?act=Product_Booking&id=<?=$simple_booking['order_id']?>&booking=1" class="request_content">
                            <p>Заявка номер: <span class="strong_span"><?=$simple_booking['order_id']?></span></p>
                            <p>Бронирование</p>
                        </a>
                    </div>
            <?}}else{
                echo "У вас нет бронирований";
            }
           ?>
    </div>
</div>