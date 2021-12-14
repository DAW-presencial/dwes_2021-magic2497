<?php

class Agenda
{

    // database connection and table name
    private $conn;
    private $table_name = "contactes";

    // object properties

    public $nom;
    public $telefono;
    public $email;


    // constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create new user record
    function createContact()
    {

        // to get time stamp for 'created' field
        $this->created = date('Y-m-d H:i:s');

        // insert query
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
            nom = :nom,
            telefono = :telefono,
            email = :email,";

        // prepare the query
        $stmt = $this->conn->prepare($query);


        // bind the values
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);



        // execute the query, also check if query was successful
        if ($stmt->execute()) {
            return true;
        } else {
            $this->showError($stmt);
            return false;
        }
    }
    public function showError($stmt)
    {
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }

    // read all user records
    function readAll()
    {

        // query to read all user records, with limit clause for pagination
        $query = "SELECT
                nom,
                email,
                telefono,
            
                
            FROM " . $this->table_name . "
            ORDER BY id DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);



        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }
}
