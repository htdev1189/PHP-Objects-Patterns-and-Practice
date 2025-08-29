<?php 
declare(strict_types=1);
namespace App\Builder;

class QueryBuilder {
    private string $table = "";
    private array $fields = [];
    private array $conditions = [];

    // select
    public function select(array $fields) : self {
        $this->fields = $fields;
        return $this;
    }
    //from
    public function from(string $table) : self {
        $this->table = $table;
        return $this;
    }
    // where
    public function where($condition) : self {
        $this->conditions[] = $condition;
        return $this;
    }
    // build
    public function build() : string {
        $sql = "select " . implode(", ", $this->fields) . " from " . $this->table;
        if(!empty($this->conditions)){
            $sql .= " where " . implode(" and ", $this->conditions);
        }
        return $sql;
    }
}