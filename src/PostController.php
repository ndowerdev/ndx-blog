<?php
namespace Ndx\Blog;

use React\Http\Message\Response;

class PostController
{
    public function __invoke()
    {

        return \React\Http\Message\Response::html(render('post'));
    }

}
