<?php
class GruppaMap extends BaseMap{
    public function arrGruppa(){
        $res = $this->db->query("SELECT gruppa_id AS id, name AS value FROM gruppa");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}