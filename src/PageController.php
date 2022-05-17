<?php
namespace Ndx\Blog;

use React\Http\Message\Response;

class PageController
{
    public function __invoke()
    {

        return \React\Http\Message\Response::html(render('page'));
    }

}
