<?
    $product = new M_Model;
    $result = $product->getProduct();
    $tourInfo = $result;
?>
<div class="product_container">
    <div class="product_title">
        <h1>Тур</h1>
    </div>
    <hr id="vertical_product_hr">
        <div class="product_img">
            <img src="<?=$result['img']?>" width="100%" height="100%">
        </div>
        <div class="product_hotel">
            <h1><?=$result['hotel']?> <?=$result['stars']?>*</h1> 
        </div>
        <div class="product_place">
            <p><?=$result['place']?></p>
        </div>
        <div class="product_nigths">
            <p><?=$result['nights']?> ночей</p>
        </div>
        <div class="product_flight_dates">
            <p>Дата вылета: <?=$result['flight_dates']?></p>
        </div>
        <div class="product_cost">
            <p><?=$result['cost']?> руб.</p>
        </div>
    <div class="product_upload_date">
        <p><?=$result['date']?></p>
    </div> 
</div>