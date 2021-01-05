<?php
class Gruppa extends Table{
    public $gruppa_id = 0;
    public $name = '';
    public $special_id = 0;
    public $date_begin = '';
    public $date_end = '';

    function validate(){
        return false;
    }
}