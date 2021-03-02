<?php
/** connect to database */
require('database.php');

class Model extends Database
{
    function __construct()
    {
		parent::__construct();
    }

    public function create($item)
    {
        $item = mysqli_real_escape_string($this->conn, $item);

        $sql  = "INSERT INTO todo (item) VALUES ('{$item}')";
        $save = $this->conn->query($sql);

        /** short hand if else */
        return $save ? mysqli_insert_id($this->conn) : FALSE;
    }

    public function get($id)
    {
        $id     = mysqli_real_escape_string($this->conn, $id);

        $sql    = "SELECT * FROM todo WHERE id={$id}";
        $result = $this->simplify_result($sql);
    
        return empty($result) ? [] : $result[0]; /** get one row */
    }

    public function get_all()
    {
        $sql = "SELECT * FROM todo";
        return $this->simplify_result($sql);
    }

    public function update($input)
    {
        $id   = mysqli_real_escape_string($this->conn, $input['id']);
        $item = mysqli_real_escape_string($this->conn, $input['item']);

        $sql  = "UPDATE todo SET item='{$item}' WHERE id={$id}";
        $save = $this->conn->query($sql);

        return $save ? TRUE : FALSE;
    }

    public function delete($id)
    {
        $id     = mysqli_real_escape_string($this->conn, $id);

        $sql    = "DELETE FROM todo WHERE id={$id}";
        $delete = $this->conn->query($sql);

        return $delete ? TRUE : FALSE;
    }

    private function simplify_result($sql)
    {
        $result = $this->conn->query($sql);

        $data = [];
        
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return $data;
    }
}
?>