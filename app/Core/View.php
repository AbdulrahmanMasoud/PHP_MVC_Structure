<?php


class View{
    public static function load($view_name, $view_data=[]){

        if(file_exists(VIEWS.$view_name.'.php')){//هنا بقوله لو صفحه الفيو دي موجوده في ملف الفيوز
            //VIEWS = define("VIEWS",APP.'Views'.DS); From File Autoload

            extract($view_data); //دي بتعمل الكي بتاع اي عنصر في المصفوفه بتعمله متغير اقدر استخدمه كا متغير
            ob_start();
            require(VIEWS.$view_name.'.php'); // هنا هيستدعيه عشان لقى اسم الصفحه موجود
            ob_end_flush();
        }else{
            echo 'Sorry This Does Not exiest';
        }
    }
}

?>