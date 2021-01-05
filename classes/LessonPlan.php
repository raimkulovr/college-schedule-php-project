<?php
class LessonPlan extends Table{
    public $lesson_plan_id = 0;
    public $gruppa_id = 0;
    public $subject_id = 0;
    public $user_id = 0;
    
    function validate(){
        return false;
    }
}