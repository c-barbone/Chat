<?php
// =======================================================================================================
    // <!-- database connection -->
// =======================================================================================================

function database()
{
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
}
?>