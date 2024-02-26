<?php
/**
 * App class, Initialize at start, with all fields as singleton in whole <applet>
 * Self Initialize as static field
 */
namespace app\core;
class Application {
    
    /**
     * Main static $app object, same instance in all app
     * @var Application
     */
    public static Application $app;
    /**
     * @var Controller
     */
    public Controller $controller;
    /**
     * @var string
     */
    public static string $ROOT_DIR;
    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;

    /**
     * Constructor - Initialize all app fields to be accessible as singleton
     * @param string $rootPath
     */
    public function __construct(string $rootPath) 
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * Resolve request true router and echo the result
     * @return void
     */
    public function run(): void
    {
        echo $this->router->resolve();
    }
    /**
     * getController - getter for this->controller
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
    /**
     * setController - setter for this->controller
     * @param Controller $controller
     * 
     * @return void
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    
}