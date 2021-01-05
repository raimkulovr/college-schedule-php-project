<?php
class Classroom extends Table{
    public $classroom_id = 0;
    public $name = '';
    public $active = 1;
    
    function validate(){
        return false;
    }
}