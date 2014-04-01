<?php

namespace QueryBuilder;

class QueryBuilder
{
    public $where = array();
    public $and   = array();

    public function __call($method, $args)
    {
        if (preg_match("/where(\d+)/", $method, $matches)) {
            
            $group = (int)$matches[1];
            echo $group;
            $this->where($group, $args[0], $args[1], $args[2]);

        }

        return $this;
    }

    public function where($group, $field, $operator, $subject)
    {
        $this->where[$group][] = " $field $operator $subject";
        return $this;
    }

    public function whereBetween($group, $field, $a, $b)
    {
        $this->and[$group][] = " $field BETWEEN $a AND $b";
        return $this;
    }

    public function bulidSQL()
    {
        $sql = "SELECT * FROM TATATA";

        foreach ($this->where as $group) {

            $whereSql[] = implode(" AND", $group);
        }

        $whereSql = "WHERE " . implode(' OR ', $whereSql);

        
        $sql .= $whereSql;
        echo $sql;

    }

}

$query = new QueryBuilder();

$query->where1("id", "=", 5)
->where2("name", "LIKE", "Victor")
->bulidSQL();
