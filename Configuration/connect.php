<!-- Conexão com o Banco de Dados -->

<?php
    define('HOST','localhost:3306');
    define('DATABASENAME','Projeto_Invisalign');
    define('USER','root');
    define('PASSWORD','boreal11');
    
    class Connect {
        protected $connection;
        private static $instance = null;

        function __construct() {
            $this->connectDatabase();
        }
        function connectDatabase() {
            try {
                // Realiza a conexão com o Banco de Dados.
                $this->connection = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME, USER, PASSWORD);
            } catch (PDOException $e) {
                echo "Error!".$e->getMessage();
                die();
            }
        }
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new Connect();
            }
            return self::$instance;
        }
    
        public function getConnection() {
            return $this->connection;
        }
    }
?>