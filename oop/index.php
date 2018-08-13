<?php
/**
* add spl_autoload_register to a dynamically add classes
*/
spl_autoload_register(function($className) {
    $classNameWithPath = "lib/classes/{$className}.php";
    if(is_file($classNameWithPath)) {
	require_once($classNameWithPath);    
    }
});

/**
* use the class
*/
try {
    $DirectoryManage = new DirectoryManage();
    $directory = '';
    $dirStatus = $DirectoryManage->setDirctory($directory)->removeDirectory()->getDirectoryStatus();
    if($dirStatus == 'available') {
	echo "The directory removed successfully!";
     } else {
	echo "Faild to removed the directory";
    }
}catch(Exception $e) {
    echo $e->getMessage();
}
