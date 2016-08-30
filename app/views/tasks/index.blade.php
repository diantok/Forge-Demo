@extends('layouts.scaffold')

@section('main')

<h1>To Do List</h1>

<p>{{ link_to_route('tasks.create', 'Add new task') }}</p>

@if ($tasks->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{{ $task->name }}}</td>
                    <td>{{{ $task->description }}}</td>
                    <td>{{ link_to_route('tasks.edit', 'Edit', array($task->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Tidak ada To Do List
@endif

@stop
