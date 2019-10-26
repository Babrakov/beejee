@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>Добавить новый</h1>

        @if ($errors)
        	<div class="alert alert-danger">
        	    <ul>
                <li class="error">{!! $errors !!}</li>
            </ul>
        	</div>
        @endif
        
    </div>
</div>

<form method="POST" action="/tasks/store" accept-charset="UTF-8" id="form-with-validation" class="form-horizontal">

<div class="form-group">
    <label for="user" class="col-sm-2 control-label">Имя пользователя</label>
    <div class="col-sm-10">
        <input class="form-control" name="user" type="text" id="user" required>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <input class="form-control" name="email" type="email" id="email" required>
    </div>
</div>

<div class="form-group">
    <label for="task" class="col-sm-2 control-label">Задача</label>
    <div class="col-sm-10">
        <input class="form-control" name="task" type="text" id="task" required>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input class="btn btn-primary" type="submit" value="Создать">
    </div>
</div>

</form>

@endsection