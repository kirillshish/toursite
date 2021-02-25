<?php
require "./config.php";
class M_user
{
    private $connect;   

    public function templater($filePath,$mass=array())// [1 param]путь до страницы ,[2 param] массив с переменными 
    {
        foreach($mass as $key => $value)
        {
            $$key = $value; // динамическая переменная для использования ключа массива как имя переменной в подгружаемой странице
        }
        ob_start();
        include "$filePath";
        return ob_get_clean();
    }

    public function connect()
    {
        $this->connect = pg_connect("host=".HOST." port=".PORT." dbname=".DB_NAME." user=".USER."");
    }

    public function loadImage($request_array_files)
    {
        $this->connect();
        if(empty($request_array_files['filename']['tmp_name'])){
            echo "Че то не отработало";
        }else{
            $image_path = './v/img/'.$request_array_files['filename']['name'];
            move_uploaded_file($request_array_files['filename']['tmp_name'],$image_path);
            $query1 = pg_query($this->connect,"update users set img='".$image_path."' where user_id='".$_SESSION['user_id']."'");
        }
    }

    public function profileChangeInfo($request_array,$request_array_files)
    {
        if($request_array==null){
            return false;
        }else{
            $this->connect();
            $this->loadImage($request_array_files);
            $query=pg_query($this->connect,"update users set name='".$request_array['name']."',phone='".$request_array['phone']."',mail='".$request_array['mail']."' where user_id='".$_SESSION['user_id']."'");
            header("Location:index.php?act=Profile");
            echo "Перезайдите в аккаунт чтобы были видны изменения";
        }
    }
    public function makeReview($request_array)
    {
        if(!empty($request_array)){
            $this->connect();
            $date = date('Y-m-d');
            $query=pg_query($this->connect,"insert into reviews (name,date,text,hotel,place,img) values('".$request_array['name']."','".$date."','".$request_array['text']."','".$request_array['hotel']."','".$request_array['place']."','".$_SESSION['img']."')");
            header("Location:index.php?act=Reviews");
        }
    }
    public function selectTourID()
    {
        $this->connect();
        $query=pg_query($this->connect,"select tour_id from orders where user_id='".$_SESSION['user_id']."'");
        if($query){
            $tour_array = array();
            while($result=pg_fetch_assoc($query)){
                $tour_array[]=$result;
            }
            return $tour_array;
        }else{
            return false;
        }
    }
    public function showUserCart()
    {
        $imploded = implode("','",$_SESSION['cart']);
        $this->connect();
        $query = pg_query($this->connect,"select * from tours where tour_id in('".$imploded."')");
        $tours_array = array();
        while($result=pg_fetch_assoc($query)){
            $tours_array[] = $result;
        }
        return $tours_array;
    }
    public function productButton($tourInfo)
    {
        if(!in_array($tourInfo['tour_id'],$_SESSION['cart'])){
            $button_state = 1;
        }
        return $button_state;
    }
    
    public function addToCart($tourInfo,$getAct)
    {
        if($_GET['idToAdd']){
            $_SESSION['cart'][] = $tourInfo['tour_id'];
            $getId = $tourInfo['tour_id'];
            header("Location:index.php?act=Product&id=$getId");
        }else{
            return false;
        }
    }
    public function deleteFromCart($tourInfo,$getAct)
    {
        if($_GET['idToDelete']){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value==$tourInfo['tour_id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
            $tour_id=$tourInfo['tour_id'];
            header("location:index.php?act=$getAct&id=$tour_id");
        }else{
            return false;
        }
    }
    public function deleteSimpleTourFromCart($tour,$getAct)
    {
        if($_GET['idToDelete']){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value==$_GET['idToDelete']){
                    unset($_SESSION['cart'][$key]);
                }
            }
            header("location:index.php?act=$getAct");
        }else{
            return false;
        }
    }
    public function getCost($tours_array)
    {
        $array_cost = array();
        foreach($tours_array as $cost){
            $array_cost[] = $cost['cost'];
        }
        return $array_cost;
    }
    public function checkBookings($request_array)
    {
        if($_GET['idToUpdate']){
            $this->connect();
            $query = pg_query($this->connect,"select * from orders where user_id='".$_SESSION['user_id']."'");
            $result = pg_fetch_assoc($query);
            if($result['user_id']) ;
        }else{
            return false;
        }
    }
    public function booking($tours_array)
    {
        if($_GET['idToInsert']){
            $this->connect();
            $date = date("Y-m-d");
            foreach($tours_array as $tour){
                $query = pg_query($this->connect,"select count(*) from orders where user_id='".$_SESSION['user_id']."'");
                $result=pg_fetch_assoc($query);
                foreach($result as $key=>$value);
                if($value<3){
                    $query1 = pg_query($this->connect,"insert into orders (user_id,tour_id,date) 
                    values('".$_SESSION['user_id']."','".$tour['tour_id']."','".$date."')");
                }else{
                    break;
                }
            }
            header("Location:index.php?act=Profile");
        }else{
            return false;
        }
    }
    public function showRequests()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from requests where user_id='".$_SESSION['user_id']."' order by request_id desc");
        $array_requests=array();
        while($result=pg_fetch_assoc($query)){
            $array_requests[]= $result;
        }
        return $array_requests;
    }
    public function showBookings()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from orders where user_id='".$_SESSION['user_id']."' order by order_id desc");
        $array_bookings=array();
        $array_bookings1=array();
        $array_id = array();
        while($result=pg_fetch_assoc($query)){
            $array_bookings[]= $result;
        }
        foreach($array_bookings as $book){
            $array_id[] =$book['tour_id'];
        }
        if($array_id){
            $implode = implode("','",$array_id);
            $query1 = pg_query($this->connect,"select * from tours where tour_id in('$implode')");
            while($result1=pg_fetch_assoc($query1)){
            $array_bookings1[] = $result1; 
        }
        return $array_bookings;
        }else{
            return false;
        }
    }

    public function showSimpleRequest()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from requests where request_id='".$_GET['id']."'");
        $result = pg_fetch_assoc($query);
        return $result;
    }
    public function deleteSimpleRequest()
    {
        $this->connect();
        $query = pg_query($this->connect,"delete from requests where request_id='".$_GET['idToDelete']."'");
        header("Location:index.php?act=Request");
    }
    public function showSimpleBooking()
    {
        $all_content=array();
        $tours=array();
        $users=array();

        $this->connect();

        $query = pg_query($this->connect,"select * from orders where order_id='".$_GET['id']."'");
        $result=pg_fetch_assoc($query);

        $query1= pg_query($this->connect,"select * from tours where tour_id='".$result['tour_id']."'");
        while($result1=pg_fetch_assoc($query1)){
            $tours[] = $result1;
        }
        foreach($tours as $tour);
        return $tour;
    }
        public function deleteSimpleBooking()
        {
            $this->connect();
            $query= pg_query($this->connect,"delete from orders where order_id='".$_GET['idToDelete']."'");
            header("Location:index.php?act=Request");
        }
}