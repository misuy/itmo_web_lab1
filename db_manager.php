<?php
    class DbManager {
        private $db;
        private $maxId = 0;

        public function __construct() {
            $this->db = new SQLite3("attempts.db");
            $this->db->exec("CREATE TABLE IF NOT EXISTS attempts (id INTEGER PRIMARY KEY, x REAL, y REAL, r REAL, result TEXT, current_server_time TEXT, execution_time TEXT)");
            $stmt = $this->db->prepare("SELECT * FROM attempts");
            $result = $stmt->execute();
            while (true) {
                $array = $result->fetchArray();
                if (!($array)) break;
                if ($array["id"] > $this->maxId) { $this->maxId = $array["id"]; }
            }
        }   

        private function resultSetToArray($result) {
            $array = [];
            while ($row = $result->fetchArray()) {
                $array[] = $row;
            }
            return($array);
        }

        public function getAllAttempts() {
            $stmt = $this->db->prepare("SELECT * FROM attempts");
            $result = $stmt->execute();
            return($this->resultSetToArray($result));
        }

        public function getAttemptById($id) {
            $stmt = $this->db->prepare("SELECT * FROM attempts WHERE id=(:id)");
            $stmt->bindParam(":id", $id);
            $result = $stmt->execute();
            return($this->resultSetToArray($result)[0]);
        }

        public function addAttempt(int $id, float $x, float $y, float $r, string $result, $startOfExecutionTime) {
            $stmt = $this->db->prepare("INSERT INTO attempts (id, x, y, r, result, current_server_time, execution_time) VALUES (:id, :x, :y, :r, :result, :current_server_time, :execution_time)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":x", $x);
            $stmt->bindParam(":y", $y);
            $stmt->bindParam(":r", $r);
            $stmt->bindParam(":result", $result);
            $current_server_time = date("Y-m-d H:i:s", time());
            $stmt->bindParam(":current_server_time", $current_server_time);
            $executionTime = strval(hrtime()[1] - $startOfExecutionTime);
            $stmt->bindParam(":execution_time", $executionTime);
            $result = $stmt->execute();
        }

        public function getIdForNewAttempt() {
            $this->maxId++;
            return($this->maxId);
        }
    }
?>