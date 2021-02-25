<?php
require "./config.php";

class M_Model
{
    
    private $connect;

    // Функция для отображения нужной страницы
    public function templater($filePath,$mass=array())// [1 param]путь до страницы ,[2 param] массив с переменными 
    {
        foreach($mass as $key => $value)
        {
            $$key = $value; // динамическая переменная для использования ключа как имя переменной в подгружаемой странице
        }
        ob_start();
        include "$filePath";
        return ob_get_clean();
    }

    //Функция для подключения к БД
    public function connect()
    {
        $this->connect = pg_connect("host=".HOST." port=".PORT." dbname=".DB_NAME." user=".USER."");
    }

    //Отвечает за вывод 5 постов за раз на главной странице сайта Index.php
    //Это php код вместе с версткой 1 блока поста(незнаю как разделить верстку и php в данной ситуации,сделал пока так)
    public function showNotesIndexPage()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from tours order by tour_id desc limit 6");
        while($result=pg_fetch_assoc($query)){?>
            <a href="index.php?act=Product&с=Tours&id=<?=$result['tour_id']?>" id="note">
                <div class="note">
                    <div class="note_img">
                        <img src="<?=$result['img']?>" width="100%" height="100%">
                    </div> 
                    <div class="note_content">
                        <div class="up_note_content">
                            <div class="up_note_p">
                                <p id="up_note_p">
                                    <?=$result['hotel']?> 
                                    <?=$result['stars']?>*
                                </p>
                            </div>
                            <p id="up_note_place">
                                <?=$result['place']?>
                            </p>
                        </div>
                        <div class="mid_note_content">
                            <p>Вылет: <?=$result['flight_dates']?></p>
                        </div>
                        <div class="bot_note_content">
                            <p><?=$result['nights']?> ночей</p>
                            <p id="bot_note_cost"><?=$result['cost']?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?}
    } 
    public function showTours()
    {
        $array_tours = array();
        $this->connect();
        $query= pg_query($this->connect,"select * from tours order by tour_id desc");
        while($result=pg_fetch_assoc($query)){
            $array_tours[] = $result;
        }
        return $array_tours;
    } 
    public function showReviews()
        {
            $this->connect();
            $query=pg_query($this->connect,"select * from reviews where state=1 order by review_id desc");
            while($result=pg_fetch_assoc($query)){?>
                <div class="review">
                    <div class="left_side_review">
                        <div class="review_mini_profile">
                            <img id="review_img" src="<?=$result['img']?>">
                            <p id="review_name"><?=$result['name']?></p>
                            <p id="review_date"><?=$result['date']?></p>
                        </div>
                    </div>
                    <div class="right_side_review">
                        <div class="review_content">
                            <div class="review_content_title">
                                <p id="review_hotel"><?=$result['hotel']?></p>
                                <p id="review_place"><?=$result['place']?></p>
                            </div>
                            <p id="review_text"><?=$result['text']?></p>
                        </div>
                    </div>
                </div>
            <?}
        }
        public function checkRequest($request_array)
        {
            $this->connect();
            $query1=pg_query($this->connect,"select * from requests where user_id = '".$_SESSION['user_id']."'");
            $result1 = pg_fetch_assoc($query1);
            if($result1['user_id']){
                $request_already_sent = "Вы уже подали заявку на подбор тура";
                echo  $request_already_sent;
            }else{
                $this->getRequestForm($request_array);
            }
        }
        //Получение массива с данными из формы и отправка их в БД
        public function getRequestForm($request_array)
        {
            if(empty($request_array['name'])){
                $nameErr = "*Заполните поле имени";
            }else{
                $name = $request_array['name'];
            }
            if(empty($request_array['last_name'])){
                $last_nameErr = "*Заполните поле фамилии";
            }else{
                $last_name = $request_array['last_name'];
            }
            if(empty($request_array['phone'])){
                $phoneErr = "*Оставьте свой телефон";
            }else{
                $phone = $request_array['phone'];
            }
            if(empty($request_array['type'])){
                $typeErr = "*Выберите тип тура ";
            }else{
                $type = $request_array['type'];
            }
            if(empty($request_array['text'])){
                $textErr = "*Минимум 10 слов в описании в форме";
            }else{
                $text = $request_array['text'];
            }
            if(isset($name,$last_name,$phone,$type,$text)){
                $this->connect();
                $date = date('Y-m-d');
                $query=pg_query($this->connect,"insert into requests(name,last_name,phone,type,text,date) values('".$name."','".$last_name."','".$phone."','".$type."','".$text."','$date')");
                if($query){
                    setcookie("temp_user_request",1,time()+3600);
                }
                header("Location:index.php?act=Request");
            }else{
                //выводит соотвествующий текст для незаполненных полей
                echo $nameErr."<br>";
                echo $last_nameErr."<br>";
                echo $phoneErr."<br>";
                echo $typeErr."<br>";
                echo $textErr."<br>";
            }
        }
        public function registration($request_array)
        {
            if(empty($request_array['name'])){
                $nameErr = "*Заполните поле имени";
            }else{
                $name = $request_array['name'];
            }
            if(empty($request_array['login'])){
                $loginErr = "*Заполните поле с логином";
            }else{
                $login = $request_array['login'];
            }
            if(empty($request_array['pass'])){
                $passErr = "*Заполните поле с паролем";
            }else{
                $pass = $request_array['pass'];
            }
            if(empty($request_array['mail'])){
                $mailErr = "*Напишите свою почту";
            }else{
                $mail = $request_array['mail'];
            }
            if(empty($request_array['phone'])){
                $phoneErr = "*Оставьте свой телефон";
            }else{
                $phone = $request_array['phone'];
            }
            if(isset($name,$login,$pass,$phone,$mail)){
                $this->connect();
                $query=pg_query($this->connect,"insert into users(name,login,pass,mail,phone) values('".$name."','".$login."','".$pass."','".$mail."','".$phone."')");
            }else{
                //выводит соотвествующий текст для незаполненных полей
                echo $nameErr."<br>";
                echo $loginErr."<br>";
                echo $passErr."<br>";
                echo $mailErr."<br>";
                echo $phoneErr."<br>";
            }
        }
        public function authorization($request_array)
        {
            if(empty($request_array['login'])){
                $loginErr = "*Введите логин";
            }else{
                $login = $request_array['login'];
            }
            if(empty($request_array['pass'])){
                $passErr = "*Введите пароль";
            }else{
                $pass = $request_array['pass'];
            }
            if(isset($login,$pass)){
                $this->connect();
                $query=pg_query($this->connect,"select * from users where login='".$request_array['login']."' and pass='".$request_array['pass']."'");
                $result=pg_fetch_assoc($query);
                if($result){
                    session_start();
                    $_SESSION['user_id']=$result['user_id'];
                    $_SESSION['login']=$result['login'];
                    $_SESSION['pass']=$result['pass'];
                    $_SESSION['name']=$result['name'];
                    $_SESSION['mail']=$result['mail'];
                    $_SESSION['phone']=$result['phone'];
                    $_SESSION['img']=$result['img'];
                    $_SESSION['status']=$result['status'];
                    header("Location:index.php?act=Profile");
                }else{
                    echo "Не работает";
                }
            }
        }
        public function exit()
        {
            unset($_SESSION['user_id']);
            unset($_SESSION['login']);
            unset($_SESSION['pass']);
            unset($_SESSION['name']);
            unset($_SESSION['mail']);
            unset($_SESSION['phone']);
            unset($_SESSION['img']);
            unset($_SESSION['request']);
            unset($_SESSION['status']);
            header("Location:index.php?act=Index");
        }
        public function getProductId()
        {
            print_r($_GET['id']);
        }
        public function getProduct()
        {
            $this->connect();
            $query=pg_query($this->connect,"select * from tours where tour_id='".$_GET['id']."'");
            $result=pg_fetch_assoc($query);
            return $result;
        }
}

