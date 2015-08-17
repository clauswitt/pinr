<?php
namespace pinr\middleware;
class Env {
    public function __invoke(&$request) {
        $request['env'] = $_ENV;
    }
}
