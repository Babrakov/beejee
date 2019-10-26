<?php

namespace App\Controllers;

use App\Config;
use eftec\bladeone;

class Home extends \Core\Controller
{

    public function index()
    {
        header('Location: /tasks');
    }
    
    public function login()
    {
        if (!isset($_SESSION['admin'])) {
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            } else {
                $errors = null;
            }            
            $blade = new bladeone\BladeOne(Config::VIEWS);
            echo $blade->run("login",array('errors'=>$errors));
        } else {
            header('Location: /tasks');
        }
    }
    
    public function auth()
    {
        $login = filter_input(INPUT_POST, 'login');
        $pass = filter_input(INPUT_POST, 'pass');
        
        if ($login==='admin' && $pass==='123') {
            $_SESSION['admin']='admin';
            header('Location: /tasks');
        } else {
            $_SESSION['errors']='Неверные учетные данные';
            header('Location: /login');
        }
    }
    
    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: /tasks');        
    }
    
}
