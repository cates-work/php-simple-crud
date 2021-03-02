<?php
require('controller.php');

$controller = new Controller();

$action = '';

/** routes */
if (isset($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action) 
    {
        case 'create':
            $controller->create($_POST);
            break;

        case 'edit':
            $edit_todo = $controller->get($_GET['id']);
            break;
        
        case 'update':
            $controller->update($_POST);
            break;

        case 'delete':
            $controller->delete($_GET['id']);
            break;
    }
}

/** read */
$todo_list = $controller->get_all();

/** display list */
require('view.php');

?>