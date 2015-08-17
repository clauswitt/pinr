<?php
namespace pinr\middleware;
class Session {
    public function __invoke(&$request) {
        session_start();
        $request['session'] = $_SESSION;
    }
}
