<?php
class Special extends Table{
    public $special_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $active = 1;

    function validate(){
        if (!empty($this->name) &&
        !empty($this->otdel_id)){
            return true;
        }
        return false;
    }
}