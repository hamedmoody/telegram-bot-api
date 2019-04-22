<?php
/**
 * Created by PhpStorm.
 * User: Hamed
 * Date: 4/21/2019
 * Time: 11:14 PM
 */

class Base
{

    protected $fileSize;

    protected $fileID;

    protected $caption;

    public function getFileSize(){
        return $this->fileSize;
    }

    public function getFileID(){
        return $this->fileID;
    }

    public function getCaption(){
        return $this->caption;
    }

}