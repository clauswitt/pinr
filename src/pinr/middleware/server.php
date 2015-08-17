<?php
namespace pinr\middleware;
class Server {
    public function __invoke(&$request) {
        $request['server'] = $_SERVER;
    }
}
