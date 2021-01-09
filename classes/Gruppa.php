<?php
class Gruppa extends Table{
    public $gruppa_id = 0;
    public $name = '';
    public $special_id = 0;
    public $date_begin = '';
    public $date_end = '';

    function validate(){
        if (!empty($this->name) &&
        !empty($this->special_id)&&
        !empty($this->date_begin)&&
        !empty($this->date_end)) {
        return true;
        }
        return false;
    }
}