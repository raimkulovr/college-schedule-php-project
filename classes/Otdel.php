<?php
class Otdel extends Table{
    public $otdel_id = 0;
    public $name = '';
    public $active = 1;
    
    function validate(){
        if (!empty($this->name) &&
        !empty($this->active)) {
        return true;
        }
        return false;
    }

    
}