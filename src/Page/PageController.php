<?php
/**
 * Basic Page Controller
 *
 * PHP version 5.6
 *
 * @category Common
 * @package  ExampleMVC
 * @author   Joe Cochran <j_cochran@me.com>
 * @license  http://opensource.org/licenses/BSD-2-Clause BSD 2 Clause 
 * @link     http://joecochran.github.io
 */
namespace Cochran\Page;

use Cochran\Page;

/**
 * Basic Page Controller
 *
 * @category Common
 * @package  ExampleMVC
 * @author   Joe Cochran <j_cochran@me.com>
 * @license  http://opensource.org/licenses/BSD-2-Clause BSD 2 Clause 
 * @link     http://joecochran.github.io
 */
class PageController
{
    /**
     * Constructor
     */ 
    public function __construct()
    {
        $this->page = new Page();
        $this->converter = new \League\CommonMark\CommonMarkConverter();
        $this->templates = new \League\Plates\Engine('../resources/views');
    }

    /**
     * Return a list of all pages
     *
     * @return null
     */
    public function index()
    {
        echo 'list all pages';
    }

    /**
     * Load form to create new page
     *
     * @return null
     */
    public function create()
    {
        echo $this->templates->render('page/create');
    }

    /**
     * Store Page 
     *
     * @return null
     */
    public function store()
    {
        $this->page->create($_POST);
        header('Location: //page/create');
    }

    /**
     * Get page by slug
     *
     * @param string $slug to look up in database
     *
     * @return null
     */
    public function show($slug = 'home')
    {
        $page = $this->page->get($slug);
        if ($page) {
            $page['content'] = $this->converter->convertToHtml($page['content']);
            echo $this->templates->render($slug, ['data' => $page]);
        } else { 
            echo $this->templates->render('404');
        }    
    }


}
