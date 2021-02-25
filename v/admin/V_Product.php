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
        <form enctype="multipart/form-data" method="post" id="product_form"></form>
        <div class="product_img">
            <img src="<?=$result['img']?>" width="100%" height="100%">
            <input type="file" name="img" form="product_form">
        </div>
        <div class="product_hotel">
            <input type="text" name="hotel" value="<?=$result['hotel']?>" form="product_form">
            <input type="text" name="stars" value="<?=$result['stars']?>" form="product_form"> - отель, количество звезд 
        </div>
        <div class="product_place">
            <input type="text" name="place" value="<?=$result['place']?>" form="product_form"> - страна, город
        </div>
        <div class="product_nigths">
        <input type="text"  name="nights" value="<?=$result['nights']?>" form="product_form"> - ночей
        </div>
        <div class="product_flight_dates">
        <input type="text"  name="flight_dates" value="<?=$result['flight_dates']?>" form="product_form"> - дата вылета
        </div>
        <div class="product_cost1">
        <input type="text" name="cost" value="<?=$result['cost']?>" form="product_form"> - цена
        </div>
        <div class="product_cost1">
            <input type="text" name="type" value="<?=$result['type']?>" form="product_form"> - тип
        </div>
    <div class="product_upload_date">
        <p><?=$result['date']?></p>
    </div>  
    <div class="tours_href">
        <input type="submit" form="product_form" value="Редактировать" class="href_t">
        <a href="index.php?act=Product&id=<?=$result['tour_id']?>&deleteTour=1" class="href_t">Удалить</a>
    </div>
</div>
<?  
    if(!empty($_POST)){
        $tour_id=$_GET['id'];
        $request = $_POST;
        $request_array_files = $_FILES;
        $admin_product = new M_Admin;
        $admin_product->changeTour($tour_id,$request,$request_array_files);
    }
    if($_GET['deleteTour']==1){
        $tour_id = $_GET['id'];
        $admin_product = new M_Admin;
        $admin_product->deleteTour($tour_id);
    }
?>