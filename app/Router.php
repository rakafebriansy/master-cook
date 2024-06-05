<?php

namespace App;

class Router
{
    private static array $routes = [];
    
    public static function add(string $method, 
                               string $path, 
                               string $controller, 
                               string $function,
                               array  $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares
        ];
    }
    public static function run(): void 
    {
        $path = '/master-cook/';
        if (isset($_SERVER['REQUEST_URI'])) $path = $_SERVER['REQUEST_URI'];
        if(str_contains($path,'?')) $path = str_replace('?','',$path);
        $method = $_SERVER['REQUEST_METHOD'];
        foreach (self::$routes as $route) {
            $pattern = '#^' . $route['path'] . '$#';
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
                foreach ($route['middlewares'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }
                $controller = new $route['controller'];
                $function = $route['function'];
                
                array_shift($variables);

                call_user_func_array([$controller, $function], $variables);
                return;
            }
        }
        http_response_code(404);
        echo '404 NOT FOUND';
    }
}

?>