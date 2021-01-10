<?php
class ScheduleMap extends BaseMap{
    public function existsScheduleByLessonPlanId($idPlan){
        $res = $this->db->query("SELECT schedule_id FROM schedule WHERE lesson_plan_id = $idPlan");
        if ($res->fetchColumn() > 0) {
            return true;
        }
        return false;
    }
}