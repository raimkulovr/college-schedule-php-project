<?php
class ClassroomMap extends BaseMap{
    public function arrClassrooms(){
        $res = $this->db->query("SELECT classroom_id AS id, name AS value FROM classroom WHERE active=1");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT classroom_id, name, active FROM classroom WHERE classroom_id = $id");
            return $res->fetchObject("Classroom");
        }
        return new Classroom();
    }
    public function save(Classroom $classroom){
        if ($classroom->validate()) {
            if ($classroom->classroom_id == 0) {
                return $this->insert($classroom);
            } else {
                return $this->update($classroom);
            }
        }
            return false;
    }
    private function insert(Classroom $classroom){
        $name = $this->db->quote($classroom->name);
        if ($this->db->exec("INSERT INTO classroom(name) VALUES($name)") == 1) {
            return true;
        }
        return false;
    }
    private function update(Classroom $classroom){
        $name = $this->db->quote($classroom->name);
        if ( $this->db->exec("UPDATE classroom SET name = $name WHERE classroom_id = ".$classroom->classroom_id) == 1) {
            return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit= 30){
        $res = $this->db->query("SELECT classroom_id, name FROM classroom  LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM gruppa");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT classroom_id, name FROM classroom WHERE classroom_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
            return false;
    }
}