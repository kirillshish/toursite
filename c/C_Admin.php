<?php
require "config.php";

class C_Admin
{
    private $title;
    private $content;

    public function actionIndex($action)
    {
        $obj = new M_Admin;
        $this->title = $action;
        $this->content = $obj->templater("v/admin/V_".$action.".php",array('title'=>$this->title)); 
    }
    public function render($action)
    {
        $obj = new M_Admin;
        $this->actionIndex($action);
        $page = $obj->templater("v/admin/V_Main.php",array('title'=>$this->title,'content'=>$this->content));
        echo $page;
    } 
}