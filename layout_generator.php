<?php
    include("db_manager.php");
    
    class LayoutGenerator {
        private $attemptId = null;
        private $dbManager;

        public function __construct() {
            $this->dbManager = new DbManager();
        }

        public function setAttemptId($attemptId) {
            $this->attemptId = $attemptId;
        }

        public function generateLayout() {
            $attempt = null;
            if ($this->attemptId != null) { $attempt = $this->dbManager->getAttemptById($this->attemptId); }
            $attempts = $this->dbManager->getAllAttempts();

            $graph = "graph.php";
            $attemptsTable = "attempts_table.php";

            include("layout.php");
        }
    }
?>