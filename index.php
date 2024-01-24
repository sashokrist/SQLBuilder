<?php

require_once 'MysqlBuilder.php';
require_once 'PostgresBuilder.php';

function code(SQLBuilder $builder) {
    $query = $builder
        ->select("products", ["name", "description", "image"])
        ->where("price", 18.59, ">")
        ->where("price", 30.99, "<")
        ->limit(10, 20)
        ->getSQL();

    echo $query;
}

echo "MySQL builder:\n";
code(new MysqlBuilder());

echo "\n\n";
echo "<br>";

echo "PostgresSQL builder:\n";
code(new PostgresBuilder());
