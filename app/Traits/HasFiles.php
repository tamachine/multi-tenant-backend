<?php

namespace App\Traits;

trait HasFiles {  

    /**
    * The folder to store the image
    * 
    * @return string 'model/hashid'
    */
    protected function getFolderPath() {
        return $this->getModelFolder() . '/' . $this->getInstanceFolder();
    }

    /**
    * The name of the model for the folder
    * 
    * @return string 'blogpost, extra, car  ...'
    */
    protected function getModelFolder() {
        return strtolower(class_basename($this));
    }

    /**
    * The id for the instance folder
    * 
    * @return string 'usually hashid'
    */
    protected function getInstanceFolder() {
        return $this->hashid;
    } 

}