<h2 id="h2">Все заявки</h2>
<div class="admin_request_container">
    <div class="show_requests">
        <h3>Заявки на подбор тура</h3>
        <?
            $show_requests = new M_Admin;
            $array_requests = $show_requests->showAdminRequests();
            $count = count($array_requests);
            if($array_requests){ 
                for($i=0;$i<$count;$i++){
                    $simple_request = $array_requests[$i]
                    ?>
                    <div class="request">
                        <a href="index.php?act=Admin_Requests&idToDelete=<?=$simple_request['request_id']?>" class="href_cross"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABOElEQVRIie2UMU4CURRFz/0zLoFJ6C0ggQ0QRqJxAxZ2QGIJC6LVws7EFYiRsARIJMGeIWxhhmdFosDMfBMTLbjtf/+el//u+3DSv9S6Gw+SXivyrU96rWjdjQfHztyBeb89RDYSbuwDSXqtSLgxstG63x6WAraBnhAzoAFusunG1Tzz1V1ckdwL0DBYyIXP+zXKu+gyG2M0DRaB6aryOF0V1bggvIwe3hIvQBnE17wQkAdJz0h9zUsB+xCkpbDUjLqPuRdgB1FmExl1AEwfCoO4zByOpChX9r0tpZlXc6WA3RMJ6piWEu9g55nstSjCXoD9ISsMLrJAHcRMUPOBeMf060B99qQQ4JNzX8gB4CdL5AM5mIHL7BajCcxh2ymKYvV+ujHbXgNzQW3r7Cav9pt+87s+6e/1CRK156E6NCneAAAAAElFTkSuQmCC"></a>
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
            $array_bookings = $show_requests->showAdminBookings();
            if($array_bookings){
                $count1 = count($array_bookings);
                for($k=0;$k<$count1;$k++){
                    $simple_booking = $array_bookings[$k];
                    ?>
                <div class="booking">
                        <a href="index.php?act=Admin_Requests&idToDelete=<?=$simple_booking['order_id']?>" class="href_cross"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABOElEQVRIie2UMU4CURRFz/0zLoFJ6C0ggQ0QRqJxAxZ2QGIJC6LVws7EFYiRsARIJMGeIWxhhmdFosDMfBMTLbjtf/+el//u+3DSv9S6Gw+SXivyrU96rWjdjQfHztyBeb89RDYSbuwDSXqtSLgxstG63x6WAraBnhAzoAFusunG1Tzz1V1ckdwL0DBYyIXP+zXKu+gyG2M0DRaB6aryOF0V1bggvIwe3hIvQBnE17wQkAdJz0h9zUsB+xCkpbDUjLqPuRdgB1FmExl1AEwfCoO4zByOpChX9r0tpZlXc6WA3RMJ6piWEu9g55nstSjCXoD9ISsMLrJAHcRMUPOBeMf060B99qQQ4JNzX8gB4CdL5AM5mIHL7BajCcxh2ymKYvV+ujHbXgNzQW3r7Cav9pt+87s+6e/1CRK156E6NCneAAAAAElFTkSuQmCC"></a>
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