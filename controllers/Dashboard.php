<?php
class Dashboard extends Controller{
    public function index(){
        require_once("views/admin/dashboard.phtml");
    }
}