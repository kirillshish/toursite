<?
$request = new M_User;
$array_request = $request->showSimpleBooking();
?>
<div class="product_request_container">
    <div class="request_h3_header">
        <h3>Заявка на подбор тура</h3>
    </div>
    <div class="product_request_content">
        <div class="product_request_info_booking">
            <div class="req_info">
                <p>Отель:</p>
                <span class="info_req"> <?=$array_request['hotel']?> <?/*=$array_request['stars']*/?>*</span>
                <p>Страна, Город</p>
                <span class="info_req"><?=$array_request['place']?></span>
                <p>Количество ночей</p>
                <span class="info_req"><?=$array_request['nights']?></span>
                <p>Дата вылета:</p>
                <span class="info_req"><?=$array_request['flight_dates']?></span>
                <p>Стоимость:</p>
                <span class="info_req"><?=$array_request['cost']?></span>
                <hr id="horizontal_request_hr">
            </div>
        </div>
    </div>
    <span class="info_req_date"><?=$array_request['date']?></span>
</div>
