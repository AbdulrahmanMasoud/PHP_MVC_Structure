<?php 
define("DS",DIRECTORY_SEPARATOR); // عشان تتعامل مع الاسلاش /
define("ROOT",dirname(__DIR__).DS); // ده بيجيب مسار الملفات
define("APP",ROOT.'APP'.DS); // مسار ملف الااب كله
define("CORE",APP.'Core'.DS); // مسار ملف الكور في الااب
define("CONFIG",APP.'Config'.DS);
define("CONTROLLERS",APP.'Controllers'.DS);
define("MODELS",APP.'Models'.DS);
define("VIEWS",APP.'Views'.DS);
define("UPLOADS",ROOT.'public'.DS.'uploads'.DS);





// autoload all classes 
$modules = [ROOT,APP,CORE,VIEWS,CONTROLLERS,MODELS,CONFIG];
set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload',false);

new App();

?>