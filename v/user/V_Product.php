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
        <?
            $button = new M_User;
            $button_state =  $button->productButton($tourInfo);
            $getAct = $_GET['act'];
            if($button_state == 1){?>
                <a href="index.php?act=Product&id=<?=$tourInfo['tour_id']?>&idToAdd=<?=$tourInfo['tour_id']?>&changeState=<?=$button_state?>" id="add_to_cart_button">  
                Добавить в корзину
                <?
                $button->addToCart($tourInfo,$getAct);
                ?>
                </a>
                <?
            }else{?>
                <a href="index.php?act=Product&id=<?=$tourInfo['tour_id']?>&idToDelete=<?=$tourInfo['tour_id']?>&changeState=<?=$button_state?>" id="add_to_cart_button">
                Убрать из корзины
                <?
                $button->deleteFromCart($tourInfo,$getAct);?>
                </a>
                <?
            }
        ?>
</div>