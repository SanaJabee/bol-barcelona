{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bowls</h1>
@stop

@section('content')
    <p>All the bowls</p>

    <div class="container">
        <a href="{{url('admin/bowls/create')}}" style="float: right;" class="btn btn-primary">Add Bowl</a><br><br><br>
        <table class="data-table" class="display" style="width:100%;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Extra.</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{$record->name}}</td>
                    <td>{{typesList($record->type)}}</td>
                    <td>{{$record->price}}</td>
                    <td>{{specsList($record->specs)}}</td>
                    <td>{{$record->description}}</td>
                    <td>{{$record->created_at}}</td>
                    <td>{{$record->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('bowls.edit',$record->id)}}" style="margin-top: 5px;"
                           class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"
                                                                aria-hidden="true"></span></a></td>
                    <td>

                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'bowls.destroy', $record->id ] ])}}
                        {{ Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['type' => 'submit','class' => 'btn btn-sm btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Extra.</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        $(document).ready(function () {
            $('.data-table').dataTable({
                "order": [[ 5, "desc" ]],

            });
        });

    </script>
@stop