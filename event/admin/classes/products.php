<?php

class Products
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "products";

    // object properties
    public $id;
    public $name;
    public $price;
    public $error =false;
    public $success =false;
    public $msg ='';


    public function __construct($db)
    {
        $this->db_conn = $db;
    }

   

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET name = ?, price = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->name);
        $prep_state->bindParam(2, $this->price);

        if ($prep_state->execute()) {
            $this->success=true;
            $this->msg='Product added successfully';
        } else {
            $this->error=true;
            $this->msg='Somethng went wrong';

        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET name = :name, price = :price  WHERE id = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':name', $this->name);
        $prep_state->bindParam(':price', $this->price);
        $prep_state->bindParam(':id', $this->id);

        // execute the query
        if ($prep_state->execute()) {
             $this->success=true;
            $this->msg='Product updated successfully';
        } else {
            $this->error=true;
            $this->msg='Somethng went wrong';

        }
    }


    function delete($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function getAllProducts()
    {
        $sql = "SELECT id, name, price FROM " . $this->table_name . " ORDER BY id DESC";


        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->execute();
        $row = $prep_state->fetchAll(PDO::FETCH_ASSOC);
        return $row;

    }

    // for edit Product form when filling up
    function getProduct()
    {
        $sql = "SELECT name, price,id FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


}







