<?php
namespace pinr\middleware;
class Cookies {
    public function __invoke(&$request) {
        $request['cookies'] = $_COOKIE;
    }
}
