<?php
/**
 * App class, Initialize at start, with all fields as singleton in whole <applet>
 * Self Initialize as static field
 */
namespace app\core;
class Application {
    
    public static Application $app;
    public Controller $controller;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    /**
     * Constructor - Initialize all app fields to be accessible as singleton
     * @param string $rootPath
     */
    public function __construct(string $rootPath, array $config) 
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
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