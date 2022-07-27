<?php 
    class Connect {
        private $host = 'localhost';
        private $username = 'keira';
        private $password = 'Keira@296';
        private $dbname = 'ql_booking';

        protected static $instance;
        
        public function getConnect() {
            try {
                if (empty(self::$instance)) {
                    self::$instance = new PDO(
                        "mysql:host=$this->host;dbname=$this->dbname","$this->username","$this->password",
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                                PDO::MYSQL_ATTR_FOUND_ROWS => true)
                    );
                }
                return self::$instance;
            } catch (Exception $e) {
                echo die('err :'. $e->getMessage());
            }
        }
    }
    $connect = new Connect();
    $conn = $connect->getConnect();
?>