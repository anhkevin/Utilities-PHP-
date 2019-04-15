<?php 
class FileDir {
    /**
     * Function: checkEmptyDir
     * 
     * @return : true - not empty, false - empty
     */
    static function checkEmptyDir($dir){ 
        return (($files = scandir($dir)) && count($files) > 0); 
    }
    
    /**
     * Function: getListFile
     * 
     * @return : array include all file
     */
    static function getListFile($dir, $arrayFile = array()) {
        $listFile = $arrayFile;
        $listDir = scandir($dir);
        foreach ($listDir as $key => $value) {
            if (!in_array($value,array(".",".."))) {
                if(!is_dir($dir."\\".$value)) {
                    array_push(
                        $listFile,
                        $dir."\\".$value
                    );
                } else {
                    $listFile = FileDir::getListFile($dir."\\".$value,$listFile);
                }
            }
        }
        return $listFile;
    }
}
?>