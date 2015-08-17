<?php
namespace pinr\middleware;
class Body {
    public function __invoke(&$request) {
        $request['body'] = file_get_contents('php://input');
    }
}
