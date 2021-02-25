<?php

require "config.php";
//Здесь рендерится страница для зарегестрированного пользователя
class C_User
{
    private $title;
    private $content;

    public function actionIndex($action)
    {
        $obj = new M_User;
        $this->title = $action;
        $this->content = $obj->templater("v/user/V_".$action.".php",array('title'=>$this->title)); 
    }
    public function render($action)
    {
        $obj = new M_User;
        $this->actionIndex($action);
        $page = $obj->templater("v/user/V_Main.php",array('title'=>$this->title,'content'=>$this->content));
        echo $page;
    }
}