<?php

require_once 'SQLBuilder.php';

class MysqlBuilder implements SQLBuilder {
    protected $query = '';
    protected $whereCount = 0;

    public function select($table, $fields) {
        $fieldsList = implode(', ', $fields);
        $this->query .= "SELECT $fieldsList FROM $table ";
        return $this;
    }

    public function where($field, $value, $operator) {
        // Add space before WHERE or AND
        $this->query .= (strpos($this->query, 'WHERE') === false) ? " WHERE " : " AND ";
        // format value part of the condition
        $formattedValue = is_numeric($value) ? $value : "'$value'";
        // Create WHERE clause
        $this->query .= "`$field` $operator $formattedValue ";

        return $this;
    }


    public function limit($start, $offset) {
        return $this;
    }

    public function getSQL() {
        return rtrim($this->query) . ";";
    }
}
