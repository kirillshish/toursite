<div class="profile_container">
    <div class="edit_profile_information">
        <div class="edit_img">
            <img src="<?=$_SESSION['img']?>" id="profile_img">
            <div class="edit_profile_img">
                <p>Изменить фотографию:</p>
                <form enctype="multipart/form-data" method="post" id="edit_profile_form">
                    <input type="file" name="filename">
                </form>
            </div>
        </div>
        <hr id="profile_horizontal_hr" class="edit_input_profile_info">
        <div class="edit_name">
            <p>Сменить имя:</p>
            <input type="text" name="name" form="edit_profile_form" class="edit_input_profile_info" value="<?=$_SESSION['name']?>">
        </div>
        <div class="edit_phone">
            <p>Сменить телефон:</p>
            <input type="text" name="phone" form="edit_profile_form" class="edit_input_profile_info" value="<?=$_SESSION['phone']?>">
        </div>
        <div class="edit_mail">
            <p>Сменить почту:</p>
            <input type="text" name="mail" form="edit_profile_form" class="edit_input_profile_info" value="<?=$_SESSION['mail']?>">
        </div>
        <div class="edit_info_load">
            <input type="submit" value="Загрузить" form="edit_profile_form" id="edit_profile_submit">
        </div>
    </div>
<?
    $getAct = $_GET['act'];
    $request_array = $_POST;
    $request_array_files = $_FILES;
    $profile = new M_User;
    $profile->profileChangeInfo($request_array,$request_array_files);
?>
    <div class="profile_cart">
        <h3>Корзина</h3>
        <div class="goods_cart">
            <?
                if(empty($_SESSION['cart'])){
                    $basketERROR = "В вашей корзине нет товаров";
                    echo $basketERROR;
                }else{
                    $tours_array = $profile->showUserCart();
                    foreach($tours_array as $tour){?>
                        
            
                <a href="index.php?act=Product&id=<?=$tour['tour_id']?>" id="note">
                    <div class="good">
                        <div class="good_img">
                            <img src="<?=$tour['img']?>" width="100%" height="100%">
                        </div> 
                        <div class="note_content">
                            <div class="up_note_content">
                                <div class="up_note_p">
                                    <p id="up_note_p">
                                        <?=$tour['hotel']?> 
                                        <?=$tour['stars']?>*
                                    </p>
                                </div>
                                <p id="up_note_place">
                                    <?=$tour['place']?>
                                </p>
                            </div>
                            <div class="mid_note_content">
                                <p>Вылет: <?=$tour['flight_dates']?></p>
                            </div>
                            <div class="bot_note_content">
                                <p><?=$tour['nights']?> ночей</p>
                                <p id="bot_note_cost"><?=$tour['cost']?></p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="index.php?act=Profile&idToDelete=<?=$tour['tour_id']?>" id="profile_delete_from_cart">
                    <?
                        $profile->deleteSimpleTourFromCart($tour,$getAct);
                    ?>
                    Удалить
                </a>
                <?}
            }?>
        </div>
    </div>
    <div class="payment">
        <?
        if(!empty($_SESSION['cart'])){
            $array_cost = $profile->getCost($tours_array);
            if($array_cost){
                $array_sum = array_sum($array_cost);
                $array_count = count($array_cost);
            }
        }
        ?>
    <h3>Бронирование туров</h3>
        <div class="payment_form">
            <h3>Ваши туры</h3>
            <hr id="orders_horizontal_hr">
            <div class="tour_order">
                <p>Туры: <?print_r($array_count)?></p>
                <p>Итого: <?print_r($array_sum)?> руб.</p>
            </div>
            <div class="pay_text">
                <p>Нажимая на кнопку, вы соглашаетесь с Условиями обработки персональных данных</p>
            </div>
            <form method="post" action="index.php?act=Profile&idToInsert=<?=$_SESSION['user_id']?>">
                <input type="submit" value="Забронировать" class="pay_button">
            </form>
            <?
                $profile->booking($tours_array);
            ?>
        </div>
        <div class="payment_text">
            <p>1)Вы можете забронировать только 3 тура за раз.</p>
            <p>2)Забронированные туры вы можете посмотреть в разделе "Ваши заявки"</p>
        </div>
    </div>
</div>