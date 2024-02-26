<?php

namespace app\core;

class Router {
    /**
     * @var array
     */
    protected array $routes = [];
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;

    /**
     * Constructor - get singleton Request and Response objects
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response) 
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * get - add get request route with callback to $this->routes
     * @param string $path
     * @param mixed $callback
     * 
     * @return [type]
     */
    public function get(string $path, $callback) 
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * post - add post request route with callback to $this->routes
     * @param string $path
     * @param mixed $callback
     * 
     * @return [type]
     */
    public function post(string $path, $callback) 
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Router entry point
     * Accessing request params from super global variables
     * @return [type]
     */
    public function resolve() 
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }
        if(is_array($callback)) {
            // Create instance of object
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }

    /**
     * renderView - get layout and content views, add variables and return to frontend as html
     * @param string $view
     * @param array $params
     * 
     * @return [type]
     */
    public function renderView(string $view, array $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }
    /**
     * renderContent - render view content
     * @param string $viewContent
     * 
     * @return [type]
     */
    public function renderContent(string $viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    /**
     * layoutContent - render layout content
     * @return [type]
     */
    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * renderOnlyView - render only view 
     * @param string $view
     * @param array $params
     * 
     * @return [type]
     */
    protected function renderOnlyView(string $view, array $params = [])
    {
        foreach($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}