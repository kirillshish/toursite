<?php
require "m/M_Model.php";
require "config.php";
//Здесь рендерится обычная страница для незарегестрированного пользователя
class C_Page
{
    private $title;
    private $content;

    public function actionIndex($action)
    {
        $obj = new M_Model;
        $this->title = $action;
        $this->content = $obj->templater("v/unsigned/V_".$action.".php",array('title'=>$this->title)); 
    }
    public function render($action)
    {
        $obj = new M_Model;
        $this->actionIndex($action);
        $page = $obj->templater("v/unsigned/V_Main.php",array('title'=>$this->title,'content'=>$this->content));
        echo $page;
    }
}