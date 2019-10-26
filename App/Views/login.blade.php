@extends('layouts.master')

@section('content')

@if (isset($errors))
    <div class="alert alert-danger">
        <ul>
            <li class="error">{!! $errors !!}</li>
        </ul>
    </div>
@endif
    
<form method="POST" action="/auth" accept-charset="UTF-8" id="form-with-validation" class="form-horizontal">
<div class="col-md-8 col-md-offset-2">
    
<div class="form-group">
    <label for="user" class="col-sm-2 control-label">Логин</label>
    <div class="col-sm-10">
        <input class="form-control" name="login" type="text" id="login" required>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Пароль</label>
    <div class="col-sm-10">
        <input class="form-control" name="pass" type="password" id="pass" required>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input class="btn btn-primary" type="submit" value="Войти">
    </div>
</div>
</div>

</form>

@endsection