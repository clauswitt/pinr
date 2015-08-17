<?php
namespace pinr\middleware;
class Post {
    public function __invoke(&$request) {
        $request['post'] = $_POST;
    }
}
