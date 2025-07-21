<?php

namespace App\Http\Controllers;

use App\Models\Repertory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepertoryRequest;
use App\Http\Requests\UpdateRepertoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RepertoryController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //

        try{

            $newRepertory = Repertory::findOrNew($request->get('id'));

            $newRepertory
                ->fill([
                    'name' => $request->get('name'),
                    'slug' => str_replace(' ', '-', strtolower($request->get('name')))
                ])
                ->save();

            return back()->with('success', 'OK');

        }catch (\Exception $e)
        {
            Log::error('[RepertoryController] Une erreur est survenue lors de l\'ajout : ' . $e->getMessage());

            return back()->with('error', 'NOK');
        }
    }


    public function show(Repertory $repertory)
    {
        //
    }


    public function edit(Repertory $repertory)
    {
        //
    }



    public function destroy(Repertory $repertory)
    {
        try{
            $repertory->delete();

            return back()->with('success', 'OK');
        }catch (\Exception $e)
        {
            Log::error('[RepertoryController] Une erreur est survenue lors de la suppression : ' . $e->getMessage());

            return back()->with('error', 'NOK');
        }
    }
}
