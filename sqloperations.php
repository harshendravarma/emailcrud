<?php
class sqloperations
{
    public $db;

    protected function connection()
    {
        try {
            $DB_SERVER   = 'localhost';
            $DB_USERNAME = 'root';
            $DB_PASSWORD = '';
            $DB_DATABASE = 'crud';
            $this->db    = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
        }
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function create($name, $email, $gender, $hobby, $country, $address)
    {
        
        try {
            $this->connection();
            $this->db->begin_transaction();
            $insert        = mysqli_query($this->db, "INSERT INTO employee(name,email,gender,hobby,country) VALUES ('$name','$email','$gender','$hobby','$country')");
            $user_id       = mysqli_insert_id($this->db);
            $insertaddress = mysqli_query($this->db, "INSERT INTO address(address,id) VALUES ('$address','$user_id')");
            if ($insert && $insertaddress) {
                $this->db->commit();
                return 'success';
            } else {
                $this->db->rollback();
                return 'failure';
            }
        }
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
       
    public function update($name, $email, $gender, $hobby, $country, $address, $db, $id)
    {
        try {
            $this->connection();
            $this->db->begin_transaction();
            $update        = mysqli_query($this->db, "UPDATE employee SET name='$name',email='$email',gender='$gender',hobby='$hobby',country='$country' WHERE id='$id'");
            $updateaddress = mysqli_query($this->db, "UPDATE address SET address='$address', id='$id' WHERE id='$id'");
            if ($update && $updateaddress) {
                $this->db->commit();
                return 'success';
            } else {
                $this->db->rollback();
                return 'failure';
            }
        }
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }
    
    public function delete($id)
    {
        $this->connection();
        $deleteaddress = mysqli_query($this->db, "DELETE FROM address WHERE id='$id'");
        $delete        = mysqli_query($this->db, "DELETE FROM employee WHERE id='$id'");
        if ($delete && $deleteaddress) {
            return 'success';
        } else {
            return 'failure';
        }
    }
    public function read()
    {
        try {
            $this->connection();
            $select = mysqli_query($this->db, "SELECT * FROM employee INNER JOIN address ON employee.id = address.id");
            return $select;
        }
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function readbyid($table, $id)
    {
        try {
            $this->connection();
            $select = mysqli_query($this->db, "SELECT * FROM $table WHERE id='$id'");
            $fetch  = mysqli_fetch_array($select);
            return $fetch;
        }
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

?>