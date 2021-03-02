<?php
/** connect to model */
require('model.php');

class Controller 
{
    function __construct()
    {
        $this->model = new Model();
    }

    public function create($input)
    {
        $item = $input['item'];
        $this->model->create($item);

        // redirect
        header("Location: ./");
        die();
    }

    public function get($id)
    {
        return $this->model->get($id);
    }

    public function get_all()
    {
        return $this->model->get_all();
    }

    public function update($input)
    {
        $this->model->update($input);

        // redirect
        header("Location: ./");
        die();
    }

    public function delete($id)
    {
        $this->model->delete($id);
        
        // redirect
        header("Location: ./");
        die();
    }
}

?>