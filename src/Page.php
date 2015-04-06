<?php
namespace Cochran;

use \PDO; //is this preferable to $this->db = new \PDO?

class Page
{

    protected $id;

    protected $slug;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, 'PDO::ERRMODE_EXCEPTION');
        } catch(\Exception $e) {
            echo "DB Error";
            die();
        }
    }

    public function get($slug)
    {
        try {
            $results = $this->db->prepare("SELECT * FROM pages WHERE slug = ?");
            $results->bindParam(1, $slug);
            $results->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();       
        }

        $page = $results->fetch(PDO::FETCH_ASSOC);

        return $page;
    }
}
