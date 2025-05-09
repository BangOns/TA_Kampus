<?php
class App
{
    protected $controller = 'PageError';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = is_null($this->ParseURL()) ? [$this->controller, $this->method] : $this->ParseURL();
        if (file_exists('../App/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../App/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        if (!empty($url)) {
            $this->params = array_values($url);
        }
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function ParseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}