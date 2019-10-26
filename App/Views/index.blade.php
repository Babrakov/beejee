@extends('layouts.master')

@section('content')
<p><a href="/tasks/create" class="btn btn-success">Добавить</a></p>
@if ($message)
    <div class="alert alert-success">
        <ul>
            <li class="error">{!! $message !!}</li>
        </ul>
    </div>
@endif
@if ($tasks->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">Список задач</div>
        </div>
                
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="hometable">
                <thead>
                    <tr>                        
                        <th>Пользователь</th>
                        <th>Email</th>
                        <th>Текст задачи</th>
                        <th width='1%'>Статус</th>
                        <th width='1%'>Ред.</th>
                        @if (isset($_SESSION['admin']))
                            <th width='1%'></th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->user }}</td>
                            <td>{{ $task->email }}</td>                            
                            <td>{{ $task->task }}</td>                            
                            <td>{{ $task->ready ? 'Выполнена' : '' }}</td>                            
                            <td>{{ $task->edit ? 'Отред.админ.' : '' }}</td> 
                            @if (isset($_SESSION['admin']))
                                <td style='float:right;'><a href="/tasks/edit?id={{ $task->id }}"  class="btn btn-primary">Редактировать</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    Задач нет
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            
@if (isset($_SESSION['admin']))            
            var cols = [3,4,5];
@else
            var cols = [3,4];    
@endif
            
            $('#hometable').DataTable({
                "language": {
                    "url": "/js/Russian.json"
                },
                "bStateSave": true,
                "bFilter": false,
                "bLengthChange": false,
                "iDisplayLength": 3,
                "aaSorting": [[0, 'asc']],
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': cols}
                ],
            });    
                        
        });
        
    </script>
@stop