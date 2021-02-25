<div class="reg_container">
    <div class="registration">
        <form action="index.php?act=Reg" method="post">
            <h1 id="h1_reg">Регистрация</h1>
            <hr id="request_horizontal_hr">
            <input type="text" name="name" placeholder="Ваше имя" class="reg_input">
            <input type="text" name="login" placeholder="Логин" class="reg_input">
            <input type="text" name="pass" placeholder="Пароль" class="reg_input" autocomplete="off">
            <input type="text" name="mail" placeholder="Почта" class="reg_input">
            <input type="text" name="phone" placeholder="Ваш телефон" class="reg_input">
            <input type="submit" value="Зарегистрироваться" class="reg_input" id="reg_submit">
        </form>
    </div>
    <div class="auth_reg">
        <p>Если уже есть аккаунт, <a href="index.php?act=Auth" class="href_auth_reg">Авторизуйтесь</a></p>
    </div>
</div>
<?
    $request_array = $_POST;
    $registration = new M_Model;
    $registration->registration($request_array);
?>