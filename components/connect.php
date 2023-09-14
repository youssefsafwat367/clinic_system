<?php
class database
{
    public $connection;
    public const SERVERNAME = 'localhost';
    public const DATABASE = 'clinic';
    public const USERNAME = 'root';
    public const PASSWORD = "";
    public function __construct()
    {
        $this->connection = new PDO("mysql:host=" . self::SERVERNAME . ";dbname=" . self::DATABASE, self::USERNAME, self::PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function getusers($columns, $table_name, $condition = true)
    {
        $array = [];
        foreach ($columns as $column) {
            if ($column == "*") {
                $array[] = "*";
            } else {
                $array[] = "`$column`";
            }
        }
        $user = implode(", ", $array);
        $query = "SELECT $user FROM $table_name where $condition";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function Insert($columns, $table_name)
    {
        $array_key = [];
        foreach ($columns as $key => $column) {
            $array_key[] = "`$key`";
        }
        $attr = implode(",", $array_key);
        $array_values = [];
        foreach ($columns as $key => $column) {
            $array_values[] = "\"$column\"";
        }
        $values = implode(",", $array_values);
        $query = "INSERT INTO $table_name($attr) VALUES ($values)";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
    public function update_user($columns, $table_name, $condition = true)
    {
        $array = [];
        foreach ($columns as $key => $column) {
            $array[] = "`$key` " . " = " . "'$column'";
        }
        $update = implode(",", $array);
        $query = "UPDATE $table_name SET $update WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
    public function delete_user($table_name, $condition = true)
    {
        $query = "DELETE FROM $table_name WHERE $condition";
        $sql = $this->connection->prepare($query);

        return $sql->execute();
    }
    public function join_table($columns, $table_name1, $table_name2, $join_condition)
    {
        $array = [];
        foreach ($columns as $key => $column) {
            if ($column == "*") {
                $array[] = "*";
            } else {
                $array[] = "$key" . "." . "`$column`";
            }
        }
        $user = implode(", ", $array);
        $query = "  SELECT $user
                        from $table_name1 
                        join $table_name2 
                        on $join_condition ";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function get_specific_category($columns, $table_name1, $table_name2, $join_condition, $condition)
    {
        $array = [];
        foreach ($columns as $key => $column) {
            if ($column == "*") {
                $array[] = "*";
            } else {
                $array[] = "$key" . "." . "`$column`";
            }
        }
        $user = implode(", ", $array);
        $query = "  SELECT $user
                        from $table_name1 
                        join $table_name2 
                        on $join_condition
                        WHERE $condition ";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function get_specific()
    {
        $query = "select doctors.name , doctors.image , major.title  , doctors.id
                  from doctors 
                  join major 
                  on doctors.major_id = major.id ;";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function get_specific_by_id($id)
    {
        $query = "SELECT doctors.name , doctors.image , major.title , doctors.id 
                  from doctors 
                  join major 
                  on doctors.major_id = major.id
                  where major.id = $id 
                  ;";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function get_specific_by__id($id)
    {
        $query = "SELECT doctors.name , doctors.image , major.title , doctors.id 
                  from doctors 
                  join major 
                  on doctors.major_id = major.id
                  where doctors.id = $id 
                  ;";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }
    public function get_specific_doctor_by__id()
    {
        $query = "SELECT booking.* ,  doctors.name as doctor_name
                  from doctors 
                  join  booking
                  on doctors.id = booking.doctor_id
                  ;";
        $sql = $this->connection->query($query);
        return $sql->fetchAll();
    }

    
}

$user = new database();
