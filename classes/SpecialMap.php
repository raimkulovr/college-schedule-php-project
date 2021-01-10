<?php
class SpecialMap extends BaseMap{
    public function arrSpecials(){
        $res = $this->db->query("SELECT special_id AS id, name AS value FROM special ");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT special_id, name, otdel_id FROM special WHERE special_id = $id");
            return $res->fetchObject("Special");
        }
        return new Special;
    }
    public function save(Special $special){
        if ($special->validate()) {
            if ($special->special_id == 0) {
                return $this->insert($special);
            } else {
                return $this->update($special);
            }
        }
            return false;
    }
    private function insert(Special $special){
        $name = $this->db->quote($special->name);
        if ($this->db->exec("INSERT INTO special(name, otdel_id) VALUES($name, $special->otdel_id)") == 1) {
            
            return true;
        }
        return false;
    }
    private function update(Special $special){
        $name = $this->db->quote($special->name);
        if ( $this->db->exec("UPDATE special SET name = $name, otdel_id=$special->otdel_id WHERE special_id = ".$special->special_id) == 1) {
            return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit= 30){
        $res = $this->db->query("SELECT special_id, special.name, otdel.name AS otdel FROM special INNER JOIN otdel ON special.otdel_id=otdel.otdel_id LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM special");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT special_id, special.name, otdel.name AS otdel FROM special INNER JOIN otdel ON special.otdel_id=otdel.otdel_id WHERE special_id=$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
            return false;
    }
}