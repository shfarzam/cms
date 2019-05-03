<?php

class DB extends PDO
{
    public function __construct($DbType, $DbName, $DbHost, $DbUser, $DbPass)
    {
        parent::__construct($DbType . ":dbname=" . $DbName . ";host=" . $DbHost, $DbUser, $DbPass);
    }

    public function insert($table, $data)
    {
        ksort($data);

        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));;

        $stmt = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $stmt->bindValue("$key", $value);
        }
        $stmt->execute();
    }

    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $stmt = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

    public function update($table, $data, $where)
    {
        ksort($data);

        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key =:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $stmt->bindValue("$key", $value);
        }
        $stmt->execute();
    }

    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}
