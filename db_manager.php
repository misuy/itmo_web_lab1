<?php
    class DbManager {
        private $fileName = "./attempts";
        private $maxId = -1;

        private function parseCsvString($string) {
            if ($string != "")
            {
                $substrings = explode(";", $string);
                $resultArray = array();
                $resultArray["id"] = intval($substrings[0]);
                $resultArray["x"] = floatval($substrings[1]);
                $resultArray["y"] = floatval($substrings[2]);
                $resultArray["r"] = floatval($substrings[3]);
                $resultArray["result"] = $substrings[4];
                $resultArray["current_server_time"] = $substrings[5];
                $resultArray["execution_time"] = $substrings[6];
                return($resultArray);
            }
            else return(null);
        }

        private function parseCsvFile($data) {
            if ($data == null) return(null);
            else {
                $resultArray = array();
                $strings = explode("\n", $data);
                foreach ($strings as $string) {
                    $parsedString = $this->parseCsvString($string);
                    if ($parsedString != null) array_push($resultArray, $parsedString);
                }
                return($resultArray);
            }
        }


        private function createCsvString(int $id, float $x, float $y, float $r, string $result, $startOfExecutionTime) {
            $current_server_time = date("Y-m-d H:i:s", time());
            $executionTime = strval(hrtime()[1] - $startOfExecutionTime);
            $string = "{$id};{$x};{$y};{$r};{$result};{$current_server_time};{$executionTime}";
            return($string);
        }

        public function __construct() {
            $file = fopen($this->fileName, "r");
            $data = null;
            if (filesize($this->fileName) > 0) $data = fread($file, filesize($this->fileName));
            $attempts = $this->parseCsvFile($data);
            if ($attempts != null)
            {
                foreach ($attempts as $attempt) {
                    if ($attempt["id"] > $this->maxId) { $this->maxId = $attempt["id"]; }
                }
            }
            fclose($file);
        }   

        public function getAllAttempts() {
            $file = fopen($this->fileName, "r");
            $data = null;
            if (filesize($this->fileName) > 0) $data = fread($file, filesize($this->fileName));
            $attempts = $this->parseCsvFile($data);
            fclose($file);
            return($attempts);
        }

        public function getAttemptById($id) {
            $file = fopen($this->fileName, "r");
            $data = null;
            if (filesize($this->fileName) > 0) $data = fread($file, filesize($this->fileName));
            $attempts = $this->parseCsvFile($data);
            $searchingAttempt = null;
            if ($attempts != null) {
                foreach ($attempts as $attempt) {
                    if ($attempt["id"] == $id) $searchingAttempt = $attempt;
                }
            }
            fclose($file);
            return($searchingAttempt);
        }

        public function addAttempt(int $id, float $x, float $y, float $r, string $result, $startOfExecutionTime) {
            $string = $this->createCsvString($id, $x, $y, $r, $result, $startOfExecutionTime);
            $file = fopen($this->fileName, "a");
            fwrite($file, $string);
            fwrite($file, "\n");
            fclose($file);
        }

        public function getIdForNewAttempt() {
            $this->maxId++;
            return($this->maxId);
        }
    }
?>