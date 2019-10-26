<?php
namespace App\Controllers;

use \Core\Controller;
use App\Config;
use App\Models\Task;
use eftec\bladeone;

class Tasks extends Controller
{
    
    protected $blade;
    
    public function __construct()
    {
        $this->blade = new bladeone\BladeOne(Config::VIEWS);        
    }

    public function index()
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $message = null;
        }
        $task = Task::all();
        echo $this->blade->run("index",array("tasks" => $task,"message"=>$message));
    }

    public function create()
    {
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        } else {
            $errors = null;
        }
        echo $this->blade->run("create",array("errors"=>$errors));
    }
     
    public function store()
    {     
        $user = filter_input(INPUT_POST, 'user');
        $email = filter_input(INPUT_POST, 'email');
        $task = filter_input(INPUT_POST, 'task');
        
        if ($user==='' || $email==='' || $task==='') {
            $_SESSION['errors']='Все поля обязательны для заполнения';
            header('Location: /tasks/create');
        } elseif ( !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']='Формат email неправильный';
            header('Location: /tasks/create');
        } else {
            Task::create(['user'=>$user,'email'=>$email,'task'=>$task]);
            $_SESSION['message']='Задача успешно сохранена';
            header('Location: /tasks');
        }
    }
    
    public function edit()
    {
        if (isset($_SESSION['admin'])) {
            $id = filter_input(INPUT_GET, 'id');
            $task = Task::find($id);

            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            } else {
                $errors = null;
            }
            echo $this->blade->run("edit",array("task"=>$task,"errors"=>$errors));
        } else {
            header('Location: /login');
        }
    }
    
    public function update()
    {
        if (isset($_SESSION['admin'])) {
            $id = filter_input(INPUT_POST, 'id');
            $text = filter_input(INPUT_POST, 'task');
            $ready = filter_input(INPUT_POST, 'ready', FILTER_VALIDATE_BOOLEAN);

            $attributes['ready'] = $ready;
            $task = Task::findOrFail($id);
            if ($text!==$task->task) {
                $attributes['task']=$text;
                $attributes['edit']=1;
            }
            $task->update($attributes);
            header('Location: /tasks');
        } else {
            header('Location: /login');
        }
    }
     
}
 
