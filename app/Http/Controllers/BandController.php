<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Band;
use Symfony\Component\HttpFoundation\Response;

class BandController extends BaseController
{
    public function index(Request $request)
    {
        $bands = null;
        $sort = null;
        $order = null;

        if ($request->has('sort')) {
            $rules = [
                'sort' => 'in:name,start_date,website,still_active',
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
                $bands = Band::orderBy($sort, $order);
            }
        }

        if ($bands == null) {
            $bands = Band::orderBy('id');
        }

        return view('bandlist', ['bands' => $bands->paginate(50), 'sort' => $sort, 'order' => $order]);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $band = Band::find($id);
        if (!$band) {
            abort(Response::HTTP_NOT_FOUND);
        }
        return view('bandedit', ['band' => $band]);
    }

    public function update(Request $request, $id)
    {
        $band = Band::find($id);
        if (!$band) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $rules = [
            'name' => 'required|unique:bands,name,' . $id,
            'start_date' => 'date',
            'still_active' => 'boolean'
        ];

        $this->validate($request, $rules);

        $band->name = $request->get('name');
        $band->start_date = (!empty($request->get('start_date'))) ? $request->get('start_date') : null;
        $band->website = $request->get('website');
        $band->still_active = boolval($request->get('still_active'));
        $band->save();

        // redirect back to list
        \Session::flash('message', 'Successfully updated band!');
        return redirect()->route('bandIndex');

    }

    public function delete($id)
    {
        $band = Band::find($id);
        if (!$band) {
            abort(Response::HTTP_NOT_FOUND);
        }

        foreach ($band->albums as $album) {
            $album->delete();
        }
        $band->delete();

        \Session::flash('message', 'Successfully deleted band!');
        return redirect()->route('bandIndex');
    }
}