<?php

class Database
{

    // propriétés de notre classe
    private $db_host;
    private $db_name;
    private $db_port;
    private $db_user;
    private $db_pass;

    // propriété du DSN
    private $db_dsn;

    // PDO qu'on connaît bien les amis ;)
    private $pdo;

    public function __construct(
        $db_host = 'localhost',
        $db_port = '',
        $db_name = 'dwwm_23_10_19',
        $db_user = 'root',
        $db_pass = ''
    ) {
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_dsn = 'mysql:host=' . $this->db_host . ';port=' . $this->db_port . ';dbname=' . $this->db_name . ';charset=utf8';
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            try {
                // Utilisez $this->pdo plutôt que $db pour éviter toute confusion
                $this->pdo = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Oups PDO n'est pas content: " . $e->getMessage();
                die();
            }
        }
        // TOUT EST OK POUR AVOIR NOTRE OBJET PDO !
        // PDO EST APPELÉ UNE SEULE FOIS
        return $this->pdo;
    }

    public function selectAll($statement, $params = [])
    {
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function select($statement, $params = [])
    {
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
