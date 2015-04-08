<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Basic Page model
 *
 * PHP version 5.6
 *
 * @category Common
 * @package  ExampleMVC
 * @author   Joe Cochran <j_cochran@me.com>
 * @license  http://opensource.org/licenses/BSD-2-Clause BSD 2 Clause 
 * @link     http://joecochran.github.io
 */
namespace Cochran;

use \PDO;

/**
 * Basic Page model
 *
 * @category Common
 * @package  ExampleMVC
 * @author   Joe Cochran <j_cochran@me.com>
 * @license  http://opensource.org/licenses/BSD-2-Clause BSD 2 Clause 
 * @link     http://joecochran.github.io
 */
class Page
{

    protected $id;

    protected $slug;
    
    /**
     * Create a new Page Instance
     */ 
    public function __construct()
    {
        try {
            $this->db = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER, DB_PASS
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, 'PDO::ERRMODE_EXCEPTION');
        } catch(\Exception $e) {
            echo "DB Error";
            die();
        }
    }

    /**
     * Get page by slug
     *
     * @param string $slug to look up in database
     *
     * @return array Returns the page as an associative array
     */
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

    /**
     * Create new page
     *
     * @param array $data information to create page with 
     *
     * @return null
     */
    public function create(array $data)
    {
        try {
            $sql = $this->db->prepare(
                "INSERT INTO PAGES (title, slug, description, content) 
                 VALUES (:title, :slug, :description, :content)"
            );
            $sql->bindParam(':title', $data['title']);
            $sql->bindParam(':slug', $data['slug']);
            $sql->bindParam(':description', $data['description']);
            $sql->bindParam(':content', $data['content']);
            $sql->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}
