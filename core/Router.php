<?php

namespace app\core;

class Router {
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response) 
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback) 
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve() 
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            $this->response->setStatusCode(404);
            return '404 not found';
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);        

        // echo '<pre>';
        // var_dump($this->routes);
        // // var_dump($callback);
        // echo '</pre>';
        // exit;
    }

    public function renderView(string $view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView(string $view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}