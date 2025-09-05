<?php 
require_once __DIR__ . "/Database.php";
class QueryBuilder {
    // propeties
    private $connect;
    private $table;
    private $conditions = [];
    private $orderBy = '';
    private $params = [];

    public function __construct()
    {
        $this->connect = DB::getInstance()->getConnection();
    }

    // append table
    public function table($table){
        $this->table = $table;
        return $this;
    }

    // append conditions
    public function where($column, $operator, $value){
        $this->conditions[] = "$column $operator ?";
        $this->params[] = $value;
        return $this;
    }

    // order by
    public function orderBy($column, $direction = "ASC"){
        $this->orderBy = "{$column} {$direction}";
        return $this;
    }        

    // get
    public function get(){
        $sql = "select * from {$this->table}";
        if (!empty($this->conditions)) {
            $sql.= " where " . implode(" and ", $this->conditions);
        }

        if ($this->orderBy) {
            $sql .= " ORDER BY {$this->orderBy}";
        }

        // stmt
        $stmt = $this->connect->prepare($sql);

        if ($stmt && !empty($this->params)) {
            $types = str_repeat('s', count($this->params)); // giả sử tất cả là string
            $stmt->bind_param($types, ...$this->params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}