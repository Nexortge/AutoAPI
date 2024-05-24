<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Kenmerken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info('Auto index methode aangeroepen');
        return Auto::All();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Auto store methode aangeroepen met data: ', $request->all());

        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'merk' => 'required',
            'brandstof_id' => 'required'
        ]);

        if ($validator->fails()) {
            Log::warning('Auto store validatie gefaald: ', $validator->errors()->all());
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type','application/json');
        }
        else {
            $auto = Auto::create($request->all());
            Log::info('Nieuwe auto aangemaakt: ', $auto->toArray());
            return $auto;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Auto $auto)
    {
        Log::info('Auto show methode aangeroepen voor auto ID: ' . $auto->id);
        return response($auto, 200)
            ->header('Content-Type','application/json');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auto $auto)
    {
        Log::info('Auto update methode aangeroepen voor auto ID: ' . $auto->id . ' met data: ', $request->all());

        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'merk' => 'required',
        ]);
        if($validator->fails()) {
            Log::warning('Auto update validatie gefaald: ', $validator->errors()->all());
            return response('{"Foutmelding":" Data niet correct"}', 400)
                ->header('Content-Type','application/json');
        }
        $auto->update($request->all());
        Log::info('Auto bijgewerkt: ', $auto->toArray());
        return $auto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auto $auto)
    {
        Log::info('Auto destroy methode aangeroepen voor auto ID: ' . $auto->id);
        $auto->delete();
        Log::info('Auto verwijderd met ID: ' . $auto->id);
        return response('{"Succes":"Auto verwijderd"}', 200)
            ->header('Content-Type','application/json');
    }

    public function showParameters(Request $request)
    {
        Log::info('Auto showParameters methode aangeroepen met parameters: ', $request->all());

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'naam':
                    Log::info('Sorteren op naam');
                    return Auto::orderBy('naam')->get();
                case 'merk':
                    Log::info('Sorteren op merk');
                    return Auto::orderBy('merk')->get();
                default:
                    Log::warning('Ongeldige sorteer parameter: ' . $request->sort);
                    return response('{"Foutmelding":"Sorteer parameter niet correct"}', 400)
                        ->header('Content-Type', 'application/json');
            }
        }

        else if($request->has('merk')) {
            Log::info('Filteren op merk: ' . $request->merk);
            return Auto::where('merk', $request->merk)->get();
        }

        else {
            Log::info('Geen sorteer of filter parameters gevonden, ophalen alle autos met brandstof kenmerken');
            $auto = Auto::All();
            foreach ($auto as $a) {
                $brandstof = Kenmerken::where('id', $a->brandstof_id);
                $a->brandstof = $brandstof->get('brandstof_type');
            }

            return response($auto, 200)
                ->header('Content-Type','application/json');
        }
    }
}
