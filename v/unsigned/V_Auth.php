<div class="auth_container">
    <div class="authorization">
        <form action="index.php?act=Auth" method="post">
            <h1 id="h1_reg">Авторизация</h1>
            <hr id="request_horizontal_hr">
            <input type="text" name="login" placeholder="Ваш логин" class="reg_input">
            <input type="text" name="pass" placeholder="Пароль" class="reg_input" autocomplete="off">
            <input type="submit" value="Авторизироваться" class="reg_input" id="reg_submit">
            <p>Авторизируйтесь и вам будут доступны функции корзины, выбора тура и прямого диалога с тур-агентом</p>
        </form>
    </div>
    <div class="auth_reg">
        <p>Если еще нет аккаунта, <a href="index.php?act=Reg" class="href_auth_reg">Зарегиструйтесь</a></p>
    </div>
</div>
<?
    $request_array = $_POST;
    $authorization = new M_Model;
    $authorization->authorization($request_array);
?>