<?php
class SpecialMap extends BaseMap{
    public function arrSpecials(){
        $res = $this->db->query("SELECT special_id AS id, name AS value FROM special");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}