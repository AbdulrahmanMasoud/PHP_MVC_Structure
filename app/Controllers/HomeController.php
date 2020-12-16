<?php

class HomeController{
    public function index($id){

        $data['title'] = 'HomePage';
        $data['content'] = 'This Is Content Of Home Page';
        View::load('Home', $data);
    }
}


?>