<?php
/**
* recursively remove a directory
* @param string $directory
* @throws Exception
*/
function recursiveDirRemove($dir)
{
    if(!is_dir($dir)) {
        throw new Exception("Directory didn't found");
    }

    $objects = scandir($dir);

    foreach($objects as $object) {
        if($object == "." || $object == "..") {
            continue;
        }

	$path = $dir . '/' . $object;
        if(filetype($path) == 'dir') {
            recursiveDirRemove($path);
        }

	if(is_file($path)) {
	   unlink($path);
	}

    }

    reset($objects);
    rmdir($dir);
}

// use the function
try {
    $dir = 'temp';
    recursiveDirRemove($dir);
} catch(Exception $e) {
    echo $e->getMessage();
}

