<?php
class Special extends Table{
    public $special_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $active = 1;

    function validate(){
        return false;
    }
}