<?php
/**
* manage directory related all activites including directory create, recursivly directory remove etc
* @lastUpdated Md Alauddin 2018-07-06
*/
class DirectoryManage
{
    private $directory;

    /**
    * set the directory
    * @param string $directory
    * @throws Exception
    */
    public function setDirctory($directory)
    {
	if(!is_dir($directory)) {
	    throw new Exception('Your provided directory not found');	
	}

	$this->directory = $directory;
    }

    /**
    * get the directory
    * @throws Exception
    * @return string
    */
    private function getDirctory()
    {
	if($this->getDirectoryStatus() == 'unavailable') {
	    throw new Exception('Please provide a valid directory');	
	}

	return $this->directory;
    }

    /**
    * remove the directory recursivly
    */
    public function removeDirectory()
    {
	$directory = $this->getDirctory();
        $objects = scandir($directory);
        
        foreach($objects as $object) {
	    if($object == '.' || $object == '..') {
	        continue;
	    }
	    
	    $dirPath = $directory . '/' .$object;

	    if(filetype($dirPath) == 'dir') {
	        $this->removeDirectory($dirPath);	    
	    }

	    if(is_file($dirPath)) {
	        unlink($dirPath);	    
	    }
	}
	
	reset($objects);
	rmdir($directory);
    }

    /**
    * get the directory status
    * @return string
    */
    public function getDirectoryStatus()
    {
	if(!is_dir($this->directory)) {
	    echo "unavailable";	
	} else {
	    echo "available";
	}
    }
}
