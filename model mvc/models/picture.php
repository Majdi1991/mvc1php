<?php
require_once("./services/class/Database.php");

class Picture
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null)
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $pictures = $this->db->selectAll("SELECT * from picture ORDER BY id DESC ". $limit);
        return $pictures;
    }

    public function getOne($id=null)
    {
        $whereId = !is_null($id) ? "WHERE id=?" : "";
        $picture = [];
        $picture = $this->db->select("SELECT * from picture ". $whereId. "LIMIT 1",[$id]);
        return $picture;
    }
}