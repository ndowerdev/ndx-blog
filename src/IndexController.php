<?php
namespace Ndx\Blog;

use React\Http\Message\Response;

class IndexController
{
    public function __invoke()
    {
        $html = render('index');
        return \React\Http\Message\Response::html(render('index'));
    }

}
