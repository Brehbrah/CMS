<?php
    // This will be our mode that interacts with the data of our database

    /**
     * PDO Database Class
     * - Connect to database
     * - Create Prepared statements
     * - Bind Values
     * - Return rows and results
     */

    class Database {
         private $host = DB_HOST;
         private $user = DB_USER;
         private $pass = DB_PASS;
         private $dbname = DB_NAME;

         // Database handler - Going to be a default
         private $dbh;
         private $stmt;
         private $error;

         public function __construct() {
            // Set DSN (Data Source name) that requires to connect to the Database
            $dsn = 'mysql:host=' . $this -> host . ';dbname=' . $this -> dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true, // We only want persistent connection to check if we can estabish connection with the Database
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // An elegant way to handler exception
            );

            // Create PDO instance
            try {
                $this -> dbh = new PDO($dsn, $this -> user, $this -> pass, $options);
            } catch(PDOException $e) {
                $this -> error = $e -> getMessage();
                echo $this -> error;
            }
        }

        // TODO 1: Prepare Statements with query
        public function query($sql) {
            $this -> stmt = $this -> dbh -> prepare($sql);
        }

        // TODO 2: Bind Values 
        public function bind($param, $value, $type = null) {
            if(is_null($type)) {
                switch(true) { // We want to run it no matter what
                    case is_int($value): $type = PDO::PARAM_INT; break;
                    case is_bool($value): $type = PDO::PARAM_BOOL; break;
                    case is_null($value): $type = PDO::PARAM_NULL; break;
                    case is_string($value): $type = PDO::PARAM_STR; break;
                }
            }
            $this -> stmt -> bindValue($param, $value, $type);
        }

        // TODO 3: We want to execute the prepared statment and bind values
        public function execute() {
            return $this -> stmt -> execute();
        }

        // TODO 4: Get result set as array of objects
        public function resultSet() {
            $this -> execute();
            // We want to return as an object, not associated array
            return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
        }

        // TODO 5: Get single record as object
        public function single() {
            $this -> execute();
            return $this -> stmt -> fetch(PDO::FETCH_OBJ);
        }

        // TODO 6: Get row count
        public function rowCount() {
            // rowCount() is a part of method from the PDO
            return $this -> stmt -> rowCount();
        }
    }
?>