<?php
    require_once('TableModule.php');
    $CRUD = new CRUD;
    $CRUD->select_row($_GET['id']);
    $CRUD->delete_row($_GET['id']);
    header("Location: DB_Page.php");
?>