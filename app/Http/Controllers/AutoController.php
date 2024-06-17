<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Kenmerken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AuthenticationController;

class AutoController extends Controller
{

    public function index()
    {
        Log::info('Auto index methode aangeroepen');
        return Auto::All();
    }

    public function store(Request $request)
    {
        // Delete the current token
        $request->user()->currentAccessToken()->delete();
        Log::info('Auto store', ['ip' => $request->ip(), 'data' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'naam' => 'required',
            'merk' => 'required',
            'brandstof_id' => 'required'
        ]);

        if ($validator->fails()) {
            Log::warning('Auto store validatie gefaald: ', $validator->errors()->all());
            $content = [
                'success' => false,
                'data' => $request->all(),
                'foutmelding' => 'Data niet correct',
                'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
                'token_type' => 'Bearer',
            ];
            return response()->json($content, 400)
                ->header('Content-Type','application/json');
        }
        else {
            $auto = Auto::create($request->all());
            Log::info('Nieuwe auto aangemaakt: ', $auto->toArray());
            $content = [
                'success' => true,
                'data' => $auto,
                'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
                'token_type' => 'Bearer',
            ];
            return response()->json($content, 201);
        }
    }

    public function show(Auto $auto)
    {
        Log::info('Auto show methode aangeroepen voor auto ID: ' . $auto->id);
        return response($auto, 200)
            ->header('Content-Type','application/json');
    }

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


    public function destroy(Request $request, $id)
    {
        // Delete the current token
        $request->user()->currentAccessToken()->delete();
        Log::info('Auto destroy', ['ip' => $request->ip(), 'data' => $request->all()]);

        $auto = Auto::find($id);
        if ($auto) {
            $auto->delete();
            Log::info('Auto verwijderd: ', ['id' => $id]);
            $content = [
                'success' => true,
                'message' => 'Auto verwijderd',
                'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
                'token_type' => 'Bearer',
            ];
            return response()->json($content, 200);
        } else {
            Log::warning('Auto niet gevonden: ', ['id' => $id]);
            $content = [
                'success' => false,
                'message' => 'Auto niet gevonden',
                'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
                'token_type' => 'Bearer',
            ];
            return response()->json($content, 404);
        }
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
