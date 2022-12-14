<?php
    require_once('TableModule.php');
    $CRUD = new CRUD;
    $CRUD->select_row($_GET['id']);
    $CRUD->update_row($_GET['id']);
    header("Location: DB_Page.php");
?>