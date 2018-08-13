<?php
/**
* manage DirectoryManage related all test case
* @lastUpdated Md Alauddin 2018-07-06
*/
class DirectoryManageTest {

    /**
    * test the remove directory method
    * @return string
    */    
    public function testRemoveDirectory() {
	$dirMan = new DirectoryManage();
	$dir = 'a valid directory name';
	$dirStatus = $dirMan->setDirctory()->removeDirectory()->getDirectoryStatus();
	if($dirStatus == 'unavailable') {
	    echo "Directory remove test successfull!";	
	} else {
	    echo "Directory remove test faild";	
	}
    }
}

// use the class
try {
    $dirManTest = new DirectoryManageTest();
    $dirManTest->testRemoveDirectory();
} catch(Exception $e) {
   echo $e->getMessage();
}

