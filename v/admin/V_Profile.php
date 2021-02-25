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
</div>