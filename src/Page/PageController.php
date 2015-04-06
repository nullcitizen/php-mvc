<?php
namespace Cochran\Page;

use Cochran\Page;

class PageController
{
    public function __construct()
    {
        $this->page = new Page();
        $this->templates = new \League\Plates\Engine('../resources/views');
    }

    public function view($slug = 'home')
    {
        $page = $this->page->get($slug);
        if($page) {
            echo $this->templates->render($slug, ['data' => $page]);
        } else {
            $data = array(
                'title' => '404 Page Not Found',
                'slug' => '404'     
            );
            echo $this->templates->render('404', ['data' => $data]);
        }
        
    }
}
