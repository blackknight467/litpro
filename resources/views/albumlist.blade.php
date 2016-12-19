@extends('layouts.base')

@section('title', 'Album List')

@section('content')
    <h1>Album List</h1>
    {{ Form::open(['url' => URL::route('albumIndex'), 'method' => \Symfony\Component\HttpFoundation\Request::METHOD_GET, 'class' => 'form-horizontal']) }}
    <div class="form-group col-sm-6 col-xs-12">
        {{ Form::label('band', 'Filter By Band', ['class' => 'control-label col-xs-3']) }}
        <div class="col-xs-6">
            <select class="form-control" name="band">
                <option value="">All Bands</option>
                @foreach($bands as $b)
                    <option value="{{ $b->id }}" @if($b->id == $band) selected @endif>{{ $b->name }}</option>
                @endforeach
            </select>
        </div>
        {{ Form::submit('Filter', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
    <table class="table table-striped">
        <thead>
        <tr>
            @include('sortheader', ['element' => 'name', 'label' => 'Name', 'routeName' => 'albumIndex'])
            @include('sortheader', ['element' => 'band_name', 'label' => 'Band', 'routeName' => 'albumIndex'])
            @include('sortheader', ['element' => 'recorded_date', 'label' => 'Recorded', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            @include('sortheader', ['element' => 'release_date', 'label' => 'Released', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            @include('sortheader', ['element' => 'number_of_tracks', 'label' => 'Tracks', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            @include('sortheader', ['element' => 'label', 'label' => 'Label', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            @include('sortheader', ['element' => 'producer', 'label' => 'Producer', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            @include('sortheader', ['element' => 'genre', 'label' => 'Genre', 'routeName' => 'albumIndex', 'class' => 'hidden-xs'])
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->band->name }}</td>
                <td class="hidden-xs">{{ $album->recorded_date }}</td>
                <td class="hidden-xs">{{ $album->release_date }}</td>
                <td class="hidden-xs">{{ $album->number_of_tracks }}</td>
                <td class="hidden-xs">{{ $album->label }}</td>
                <td class="hidden-xs">{{ $album->producer }}</td>
                <td class="hidden-xs">{{ $album->genre }}</td>
                <td>
                    <a class="btn btn-default" href="{{ URL::route('albumEdit', ['id' => $album->id]) }}">Edit</a>
                    {{ Form::open(['url' => URL::route('albumDelete', ['id' => $album->id])]) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $albums->render() !!}
@endsection