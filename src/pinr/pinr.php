<?php
namespace pinr;
class Pinr {
    protected $middleware = array();

    public function __construct($preventDefault=false) {
        if($preventDefault === false) {
            $this->middleware[] = new middleware\Env();
            $this->middleware[] = new middleware\Server();
            $this->middleware[] = new middleware\Get();
            $this->middleware[] = new middleware\Post();
            $this->middleware[] = new middleware\Cookies();
            $this->middleware[] = new middleware\Session();
            $this->middleware[] = new middleware\Body();
        }
    }

    public function addMiddleware($callable) {
        $this->middleware[] = $callable;
    }

    protected function buildRequest() {
        return [];
    }

    protected function buildResponse() {
        return ['code' => 404, 'status' => 'Not found', 'headers' => [], 'content' =>''];
    }

    public function execute() {
        $request = $this->buildRequest();
        $response = $this->buildResponse();

        foreach($this->middleware as $middleware) {
            $result = $middleware($request, $response);
            if($result === false) {
                break;
            }
            if(!is_null($result)) {
                $response = $result;
            }
        }
        // handle errors here

        return $response;
    }

}
