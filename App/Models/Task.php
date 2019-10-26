<?php
 
namespace App\Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Task extends Model {
    
    protected $table = 'tasks';
    
    protected $fillable = [
        'user',
        'email',
        'task',
        'ready',
        'edit'
    ];
    
}
