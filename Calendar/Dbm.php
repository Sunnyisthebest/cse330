<?php
// Content of database.php
class Database
{

    public function _construct()
    {
        $this->line = [];
    }

    public function get($field = null)
    {
        if (array_key_exists($field, $this->line)) {
            return $this->line[$field];
        }
    }

//insert a row into the database
    public function insertRow($fields, $values, $table_name)
    {
        if (empty($fields)||empty($values)) {
            return false;
        }
        $dbh          = $this->connect();
        $sql          = "INSERT INTO {$table_name} (";
        foreach ($fields as $field) {
            $sql .=$field.",";
        }
        $sql = rtrim($sql, ',');
        $sql .=") VALUES (";
        foreach ($values as $value) {
            $sql .= "'".mysqli_real_escape_string($dbh, $value) . "',";
        }
        $sql = rtrim($sql, ',');
        $sql .=")";
        echo "sql:".$sql."\n";
        $result = mysqli_query($dbh, $sql);
        if (! $result) {
            error_log($sql);
            error_log(mysqli_error($dbh));
            return false;
        }
        return mysqli_insert_id($dbh);
    }

    public function load($id, $table_name)
    {
        $this->line = $this->fetchLineById($id, $table_name);

        if (!is_array($this->line)) {
            $this->line = [];
            return false;
        }
        return true;
    }

    public static function connect()
    {
        $dbh=mysqli_connect('localhost', 'root', 'password', 'NewsData');
 
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            throw "Unable to connect database";
        }
        return $dbh;
    }

//key=array('field'=>...,'val'=>...);
    public function fetchLineById($key, $name)
    {
        if (empty($key)) {
            return [];
        }
        $field = $key['field'];
        $val = $key['val'];
        $sql = "SELECT * FROM $name WHERE $field = $val LIMIT 1";


        try {
            $dbh = $this->connect();
            $res = mysqli_query($dbh, $sql);
            $row = mysqli_fetch_row($res);
            return $row;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAll($name, $field = [])
    {
        $sql = "SELECT * FROM $name";
        if (!empty($field)) {
            $f=$field['field'];
            $v=$field['val'];
            $sql .= " WHERE ".$f."=".$v;
        }
        try {
            $dbh = $this->connect();
            $res = mysqli_query($dbh, $sql);
            $results = [];
            if ($res != false) {
                while ($row = mysqli_fetch_row($res)) {
                    $results[]=$row;
                }
                return $results;
            } else {
                return '';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getAllWhere($name, $where = [])
    {
        $sql = "SELECT * FROM $name";
        if (!empty($where)) {
            $sql .= " WHERE ".$where;
        }
        try {
            $dbh = $this->connect();
            $res = mysqli_query($dbh, $sql);
            $results = [];
            if ($res != false) {
                while ($row = mysqli_fetch_row($res)) {
                    $results[]=$row;
                }
                return $results;
            } else {
                return '';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteById($name, $pk, $pk_val)
    {
        $sql = "DELETE FROM $name WHERE $pk = $pk_val LIMIT 1";
        try {
                $dbh = $this->connect();
                $res = mysqli_query($dbh, $sql);
            if (!$res) {
                error_log($sql);
                return false;
            }
                return mysqli_affected_rows($dbh);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteWhere($name, $where)
    {
        $sql = "DELETE FROM $name WHERE ".mysqli_escape_string($where);
        try {
                $dbh = $this->connect();
                $res = mysqli_query($dbh, $sql);
            if (!$res) {
                error_log($sql);
                return false;
            }
                return mysqli_affected_rows($dbh);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateById($name, $pk, $id, $update_kv)
    {
        $sql = "UPDATE $name SET ";
    
        try {
            $dbh = $this->connect();
            foreach ($update_kv as $key => $value) {
                $sql .= "`$key` = '".mysqli_escape_string($dbh, $value)."',";
            }
            $sql =rtrim($sql, ',');
            $sql .= " WHERE $pk = $id";
            $res = mysqli_query($dbh, $sql);
            if (!$res) {
                echo error_log($sql);
                return false;
            }
            return mysqli_affected_rows($dbh);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
