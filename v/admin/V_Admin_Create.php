<div class="admin_product_container">
    <div class="product_title">
        <h1>Тур</h1>
    </div>
    <hr id="vertical_product_hr">
        <form enctype="multipart/form-data" method="post" id="create_product_form"></form>
        <div class="admin_product_img">
            <p>Фотография отеля, Города или Страны.</p>
            <input type="file" name="img" form="create_product_form">
        </div>
        <div class="admin_product_hotel">
            <p>Название отеля(Без количества звезд)</p>
            <input type="text" name="hotel"  form="create_product_form" class="create_input">
            <p>Количество звезд(Без знака звездочки)</p>
            <input type="text" name="stars"  form="create_product_form" class="create_input">
        </div>
        <div class="admin_product_place">
            <p>Название Города и/или Страны</p>
            <input type="text" name="place"  form="create_product_form" class="create_input">
        </div>
        <div class="admin_product_nights">
            <p>Количество ночей(только цифра)</p>
            <input type="text"  name="nights" form="create_product_form" class="create_input">
        </div>
        <div class="admin_product_flight_dates">
            <p>Дата вылета(в формате 21.01.2021)</p>
            <input type="text"  name="flight_dates" form="create_product_form" class="create_input">
        </div>
        <div class="admin_product_cost">
            <p>Стоимость(только цифра, без руб. и других валют)</p>
            <input type="text" name="cost" form="create_product_form" class="create_input">
        </div>
        <div class="admin_product_cost">
            <p>Тип тура: </p><p>("Туры зарубеж", "Туры по России", "Экскурсионные туры", "Морские и речные круизы", "Другое").</p>
            <input type="text" name="type" form="create_product_form" class="create_input">
    </div>
        <input type="submit" form="create_product_form" value="Создать" class="admin_tours_href">
</div>
<?
    if(!empty($_POST)){
        $request = $_POST;
        $request_array_files = $_FILES;
        $admin_product = new M_Admin;
        $admin_product->addTour($request,$request_array_files);
    }
?>