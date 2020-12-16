<?php

    class App{
        protected $controller = 'Home';
        protected $method = 'index';

        protected $arguments = [];

        public function __construct()
        {
            $this->prepareURL();
            $this->render();

        }
               
        private function prepareURL(){

            $url = $_SERVER['REQUEST_URI'];
            if(!empty($url)){
                trim($url,'/');
                $url = explode('/', $url);
                array_shift($url);
                // echo $url[0];

                //define the controller class
                $this->controller = isset($url[0]) ? ucwords($url[0]).'Controller' : 'HomeController'; 
                // echo $this->controller;

                //define method in controller
                $this->method = isset($url[1]) ? ucwords($url[1]) : 'index'; 

                //define arguments in method
                unset($url[0],$url[1]); // to Delete controller and method

                $this->arguments = !empty($url) ? array_values($url) : []; 

                // print_r($this->arguments);
            }

        }

        private function render(){
            if(class_exists($this->controller)){ // هل الكلاس اللي انا كتبته ف اللينك موجود ولا لا
                $controller = new $this->controller; // هنا لول موجود اعمل منه اوبجكت
                if(method_exists($controller,$this->method)){ // هنا هل الميثود اللي نا كتبتها ف اللينك دي موجوده ف الكلاس اللي انا كاتبه ف اللينك بردو
                    //هنا بقا لو كل ده موجود هستخدم الداله دي عشان تجيب كل البراميترز اللي موجوده ف الميثود اللي موجوده ف الكلاس
                    call_user_func_array([$controller, $this->method],$this->arguments);
                }else{
                    echo 'This Method '.$this->method.' Does Not Existe';
                }
            }else{
                echo 'This Controller '.$this->controller.' Does not existe';
            }
        }
    }

?>