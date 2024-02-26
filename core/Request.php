<?php

namespace app\core;

class Request {

    /**
     * getPath - return request path from REQUEST_URI super global variable
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path, '?');

        if($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * method - return request method from REQUEST_METHOD super global variable
     * @return string
     */
    public function method(): string
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        return $method;
    }
    /**
     * isGet - check if request method is get
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    /**
     * isPost - check if request method is post
     * @return string
     */
    public function isPost(): string
    {
        $method = $this->method() == 'post';
        return $method;
    }

    /**
     * getBody - sanitize request inputs and return them as array
     * @return array
     */
    public function getBody(): array
    {
        $body = [];
        if($this->method() == 'get') {
            foreach($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->method() == 'post') {
            foreach($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

}