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

    {{ Form::model($band, ['route' => ['bandUpdate', $band->id], 'method' => \Symfony\Component\HttpFoundation\Request::METHOD_PUT]) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Start Date') }}
        {{ Form::date('start_date', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('still_active', 'Still Active') }}
        {{ Form::select('still_active', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

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
                <td><a href="{{ URL::route('albumEdit', ['id' => $album->id]) }}">{{ $album->name }}</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>


@endsection