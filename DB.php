<?php
class DBException extends Exception{
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
class DB{

    private $conn;

    private static $instance;

    protected $insert_id = 0;

    protected $raw_sql;

    protected $output_data = [];

    protected $query;

    public function __construct( $host, $name, $pass, $db){
        $this->conn = \mysqli_connect( $host, $name, $pass, $db ); 
    }

    public static function connect( $host, $name, $pass, $db ){
        if( self::$instance ){
            return self::$instance;
        }
        self::$instance = new self( $host, $name, $pass, $db );
        return self::$instance;
    }

    public function insert( $table, array $data ){

        $columns = implode(',', array_map( function( $a ){ return "`" . $a . "`"; }, array_keys( $data )) );
        $values = implode(',', array_map( function( $v ){ 
            if( is_numeric($v) ){
                return (int) $v;
            }
            return "'" . $v . "'"; 
        }, array_values( $data )) );
        
        $sql = "INSERT INTO $table ( $columns ) VALUES ( $values )";
        $this->raw_sql = $sql;

        $query = $this->conn->query( $sql );

        if( $query === true ){
            $this->insert_id = $this->conn->insert_id;
        }

        return $query;
    }

    public function delete( $table, array $where ){
        // $this->raw_sql
        // $this->conn->query()
    }

    public function select( $table ){
        $this->query = $this->conn->query( "SELECT * FROM $table" );

        $this->output_data = $this->query->fetch_assoc();

        return $this;
    }

    public function get(){
        $data = [];

        while( $row = $this->query->fetch_assoc() ){
            $data[] = $row;
        }
        return $data;
    }

    public function last_id(){
        return $this->insert_id;
    }

    public function get_raw_sql(){
        return $this->raw_sql;
    }

    public function __get( $key ){
        if( isset( $this->output_data[$key] ) ){
            return $this->output_data[$key];
        }
        return null;
    }
}