<?php
// used to get mysql database connection
class Database
{

    // specify your own database credentials
    private const host = "localhost";
    private const db_name = "agenda_mpayeras";
    private const username = "mpayeras";
    private const password = "abc123.";
    private static $conn;

    // get the database connection
    public static function getConnection()
    {

        //self::$conn = null;

        try {
            self::$conn = new PDO("pgsql:host=" . self::host . ";dbname=" . self::db_name, self::username, self::password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return self::$conn;
    }
}
