<?
$request = new M_User;
$array_request = $request->showSimpleRequest();
?>
<div class="product_request_container">
    <div class="request_h3_header">
        <h3>Заявка на подбор тура</h3>
    </div>
    <div class="product_request_content">
        <div class="product_request_info">
            <div class="req_info">
                <p>Номер заявки:</p>
                <span class="info_req"> <?=$array_request['request_id']?></span>
                <p>Ваше Имя, Фамилия:</p>
                <span class="info_req"><?=$array_request['name']?> <?=$array_request['last_name']?></span>
                <p>Тип тура:</p>
                <span class="info_req"><?=$array_request['type']?></span>
                <p>Телефон:</p>
                <span class="info_req"><?=$array_request['phone']?></span>
                <hr id="horizontal_request_hr">
            </div>
        </div>
        <div class="product_request_status">
            <p>Пожелаания клиента:</p>
            <p id="request_pp"><span class="info_req"><?=$array_request['text']?></span></p>
        </div>
    </div>
    <span class="info_req_date"><?=$array_request['date']?></span>
</div>