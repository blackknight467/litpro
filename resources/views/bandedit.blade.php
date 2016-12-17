@extends('layouts.base')

@section('title', 'Edit Band')

@section('content')
    <h1>Edit {{ $band->name }}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::model($band, ['route' => ['bandUpdate', $band->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Start Date') }}
        {{ Form::date('start_date', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('still_active', 'Still Active') }}
        {{ Form::select('still_active', [0 => 'No', 1 => 'Yes'], null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    <h2>Albums</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($band->albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>


@endsection