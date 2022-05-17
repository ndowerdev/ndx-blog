## NDX BLOG - PHP BLOG PROTOTYPE

PHP Blog prototype for easier use


### Usage
Create controller 
```
- src/IndexController
- src/PostController
- src/SitemapController
```

Sample Controller 

```php
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

```



#### CONFIG FUNCTION

```php
config('filename.value');
```


