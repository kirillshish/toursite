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
                <p>Телефон(на него позвонит тур-агент):</p>
                <span class="info_req"><?=$array_request['phone']?></span>
                <hr id="horizontal_request_hr">
                <p>Статус заявки:</p>
                <span class="info_req">
                    <?
                        if($array_request['request_state']==0){
                            $request_state = "Ваша заявка принята";
                        }elseif($array_request['request_state']==1){
                            $request_state = "Ожидайте звонок тур-агента";
                        }else{
                            $request_state = "Что-то пошло не так. Удалите и отправьте заявку заново";
                        }
                        echo $request_state;
                    ?>
                </span>
            </div>
        </div>
        <div class="product_request_status">
            <p>Ваши пожелания к подбору тура:</p>
            <p id="request_pp"><span class="info_req"><?=$array_request['text']?></span></p>
        </div>
    </div>
    <span class="info_req_date"><?=$array_request['date']?></span>
</div>