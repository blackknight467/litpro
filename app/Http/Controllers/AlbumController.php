<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Album;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends BaseController
{
    public function index(Request $request)
    {
        // define the things that will determine the query
        $albums = Album::select(\DB::raw('albums.*, bands.name as band_name'))->join('bands', 'band_id', '=', 'bands.id');
        $sort = null;
        $order = null;
        $selectedBand = null;

        // gather and validate inputs
        if ($request->has('band')) {
            $rules = [
                'band' => 'exists:bands,id',
            ];
            $validator = \Validator::make($request->all(), $rules);

            if (!$validator->fails()) {
                $selectedBand = $request->get('band');
                $albums->fromBand($selectedBand);
            }
        }

        if ($request->has('sort')) {
            $rules = [
                'sort' => 'in:name,band_name,recorded_date,release_date,number_of_tracks,label,producer,genre'
            ];
            $validator = \Validator::make($request->all(), $rules);

            if (!$validator->fails()) {
                $order = 'ASC';
                $sort = $request->get('sort');
                if ($request->has('order')) {
                    $rules = ['order' => 'in:asc,desc,ASC,DESC'];
                    $validator = \Validator::make($request->all(), $rules);
                    if (!$validator->fails()) {
                        $order = strtoupper($request->get('order'));
                    }
                }
            }
        }

        // apply sorting
        if ($sort != null) {
            $albums = $albums->orderBy($sort, $order);
        } else {
            $albums = $albums->orderBy('id');
        }

        $bands = Band::all();

        return view('albumlist', [
            'albums' => $albums->paginate(50),
            'bands' => $bands,
            'band' => $selectedBand,
            'sort' => $sort,
            'order' => $order
        ]);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $album = Album::find($id);
        if (!$album) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $bands = \DB::table('bands')->orderBy('name')->pluck('name','id');
        return view('albumedit', ['album' => $album, 'bands' => $bands]);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if (!$album) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $rules = [
            'name' => 'required|unique:albums,name,'.$id.',id,band_id,' . $album->band_id,
            'band_id' => 'required|exists:bands,id',
            'recorded_date' => 'date',
            'release_date' => 'date',
            'number_of_tracks' => 'integer|min:0'
        ];

        $this->validate($request, $rules);

        $album->name = $request->get('name');
        $album->band_id = $request->get('band_id');
        $album->recorded_date = (!empty($request->get('recorded_date'))) ? $request->get('recorded_date') : null;
        $album->release_date = (!empty($request->get('release_date'))) ? $request->get('release_date') : null;
        $album->number_of_tracks = (!empty($request->get('number_of_tracks'))) ? $request->get('number_of_tracks') : null;;
        $album->label = $request->get('label');
        $album->producer = $request->get('producer');
        $album->genre = $request->get('genre');

        $album->save();

        // redirect back to list
        \Session::flash('message', 'Successfully updated album!');
        return redirect()->route('albumIndex');

    }

    public function delete($id)
    {
        $album = Album::find($id);
        if (!$album) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $album->delete();

        \Session::flash('message', 'Successfully deleted album!');
        return redirect()->route('albumIndex');
    }
}