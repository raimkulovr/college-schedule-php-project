<?php
class GruppaMap extends BaseMap{
    public function arrGruppa(){
        $res = $this->db->query("SELECT gruppa_id AS id, name AS value FROM gruppa");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT gruppa_id, name, special_id, date_begin, date_end FROM gruppa WHERE gruppa_id = $id");
            return $res->fetchObject("Gruppa");
            }
            return new Gruppa();
    }
    public function save(Gruppa $gruppa){
        if ($gruppa->validate()) {
            if ($gruppa->gruppa_id == 0) {
                return $this->insert($gruppa);
            } else {
                return $this->update($gruppa);
            }
        }
            return false;
    }
    private function insert(Gruppa $gruppa){
        $name = $this->db->quote($gruppa->name);
        $date_begin = $this->db->quote($gruppa->date_begin);
        $date_end = $this->db->quote($gruppa->date_end);
        if ($this->db->exec("INSERT INTO gruppa(name, special_id, date_begin, date_end) VALUES($name, $gruppa->special_id, $date_begin, $date_end)") == 1) {
            $gruppa->gruppa_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Gruppa $gruppa){
        $name = $this->db->quote($gruppa->name);
        $date_begin = $this->db->quote($gruppa->date_begin);
        $date_end = $this->db->quote($gruppa->date_end);
        if ( $this->db->exec("UPDATE gruppa SET name = $name, special_id = $gruppa->special_id, date_begin = $date_begin, date_end = $date_end WHERE gruppa_id = ".$gruppa->gruppa_id) == 1) {
            return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit= 30){
        $res = $this->db->query("SELECT gruppa.gruppa_id, gruppa.name, special.name AS special, gruppa.date_begin, gruppa.date_end FROM gruppa INNER JOIN special ON gruppa.special_id=special.special_id LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM gruppa");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT gruppa.gruppa_id, gruppa.name, special.name AS special, gruppa.date_begin, gruppa.date_end FROM gruppa INNER JOIN special ON gruppa.special_id=special.special_id WHERE gruppa_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
            return false;
    }
}