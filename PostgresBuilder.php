<?php

require_once 'MysqlBuilder.php';

class PostgresBuilder extends MysqlBuilder {
    public function limit($start, $offset) {
        $this->query .= " LIMIT $offset OFFSET $start";
        return $this;
    }
}
