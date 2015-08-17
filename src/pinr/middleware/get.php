<?php
namespace pinr\middleware;
class Get {
    public function __invoke(&$request) {
        $request['get'] = $_GET;
    }
}
