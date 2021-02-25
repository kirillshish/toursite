<?php

class M_Admin
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
        if(empty($request_array_files['img']['tmp_name'])){
            echo "Что то не отработало";
        }else{
            $image_path = './v/img/'.$request_array_files['img']['name'];
            move_uploaded_file($request_array_files['img']['tmp_name'],$image_path);
            return $image_path;
        }
    }

    public function addTour($request,$request_array_files)
    {
        $this->connect();
        $image_path = $this->loadImage($request_array_files);
        $query = pg_query($this->connect,"insert into tours (img,hotel,place,flight_dates,cost,nights,stars,type)  
        values('".$image_path."','".$request['hotel']."','".$request['place']."','".$request['flight_dates']."','".$request['cost']."','".$request['nights']."','".$request['stars']."','".$request['type']."')");
        header("Location:index.php?act=Admin_Tours");
    }

    public function deleteTour($tour_id)
    {
        $this->connect();
        $query=pg_query($this->connect,"delete from tours where tour_id='".$tour_id."'");
        header("Location:index.php?act=Admin_Tours");
    }

    public function changeTour($tour_id,$request,$request_array_files)
    {
        $this->connect();
        $image_path = $this->loadImage($request_array_files);
        $query=pg_query($this->connect,"update tours set img='".$image_path."',hotel='".$request['hotel']."',place='".$request['place']."',flight_dates='".$request['flight_dates']."',cost='".$request['cost']."',nights='".$request['nights']."',stars='".$request['stars']."',type='".$request['type']."' where tour_id='".$tour_id."'");
        header("Location:index.php?act=Product&id=$tour_id");
    }

    public function showReviews()
    {
        $this->connect();
        $active_reviews=array();
        $query=pg_query($this->connect,"select * from reviews where state=1 order by review_id desc");
        while($result=pg_fetch_assoc($query)){
            $active_reviews[] = $result;
        }
        return $active_reviews;
    }

    public function showAdminReviews()
    {
        $array_reviews = array();
        $this->connect();
        $query = pg_query($this->connect,"select * from reviews where state = 0 order by review_id desc");
        while($result=pg_fetch_assoc($query)){
            $array_reviews[] = $result;
        }
        return $array_reviews;
    }
    public function acceptReview()
    {
        $this->connect();
        $review_id = $_GET['id'];
        $query= pg_query($this->connect,"update reviews set state=1 where review_id='".$review_id."'");
        header("Location:index.php?act=Admin_Reviews");
    }
    public function deleteReview()
    {
        $this->connect();
        $review_id = $_GET['id'];   
        $query= pg_query($this->connect,"delete from reviews where review_id='".$review_id."'");
        header("Location:index.php?act=Admin_Reviews");
    }
    public function checkReview()
    {
        $this->connect();
        $review_id = $_GET['id'];
        $query= pg_query($this->connect,"update reviews set state=0 where review_id='".$review_id."'");
        header("Location:index.php?act=Admin_Reviews");
    }
    public function showAdminRequests()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from requests order by request_id desc");
        $array_requests=array();
        while($result=pg_fetch_assoc($query)){
            $array_requests[]= $result;
        }
        return $array_requests;
    }
    public function showAdminBookings()
    {
        $this->connect();
        $query = pg_query($this->connect,"select * from orders order by order_id desc");
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
    public function deleteSimpleRequest()
    {
        $this->connect();
        $query = pg_query($this->connect,"delete from requests where request_id='".$_GET['idToDelete']."'");
        header("Location:index.php?act=Admin_Requests");
    }
    public function deleteSimpleBooking()
    {
        $this->connect();
        $query= pg_query($this->connect,"delete from orders where order_id='".$_GET['idToDelete']."'");
        header("Location:index.php?act=Admin_Requests");
    }
}