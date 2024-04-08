<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auto::All();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'merk' => 'required',
        ]);

        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type','application/json');
        }
        else return Auto::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Auto $auto)
    {
        return response($auto, 200)
            ->header('Content-Type','application/json');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auto $auto)
    {
        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'merk' => 'required',
        ]);
        if($validator->fails()) {
            return response('{"Foutmelding":" Data niet correct"}', 400)
                ->header('Content-Type','application/json');
        }
        $auto->update($request->all());
        return $auto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();
        return response('{"Succes":"Auto verwijderd"}', 200)
            ->header('Content-Type','application/json');
    }

    public function showParameters(Request $request)
    {
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'naam':
                    return Auto::orderBy('naam')->get();
                case 'merk':
                    return Auto::orderBy('merk')->get();
                default:
                    return response('{"Foutmelding":"Sorteer parameter niet correct"}', 400)
                        ->header('Content-Type', 'application/json');
            }
        }
        else if($request->has('merk')) {
            return Auto::where('merk', $request->merk)->get();
        }

        else {
            $auto = Auto::all();
            return response($auto, 200)
                ->header('Content-Type','application/json');
        }
    }
}
