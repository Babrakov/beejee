<?php

namespace Core;

abstract class Controller
{

    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($method, $args)
    {
      
        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("Метод $method не найден в контроллере " . get_class($this));
        }
    }
    
}
