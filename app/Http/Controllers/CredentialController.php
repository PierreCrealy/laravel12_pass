<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\Credential;
use App\Http\Controllers\Controller;
use App\Models\Repertory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Repertory $repertory)
    {
        $tags = Tag::all();

        return view('credentials.index', compact('repertory', 'tags'));
    }

    public function store(Request $request)
    {

        try{
            $newCredential = new Credential;

            $newCredential
                ->fill([
                    'name'  => $request->get('name'),
                    'value' => '',
                ])
                ->save();


            foreach ($request->get('tags') as $tagKey)
            {
                $associatedTag = new Associate;

                $associatedTag
                    ->fill([
                        'credential_id' => $newCredential->id,
                        'tag_id'        => $tagKey
                    ])
                    ->save();
            }

            return back()->with('success', 'OK');

        }catch (\Exception $e)
        {
            Log::error('[CredentialController] Une erreur est survenue lors de l\'ajout : ' . $e->getMessage());

            return back()->with('error', 'NOK');
        }
    }

    public function show(Credential $credential)
    {
        //
    }


    public function edit(Credential $credential)
    {
        //
    }


    public function update(Credential $credential)
    {

    }

    public function destroy(Credential $credential)
    {
        try{
            $credential->delete();

            return back()->with('success', 'OK');
        }catch (\Exception $e)
        {
            Log::error('[CredentialController] Une erreur est survenue lors de la suppression : ' . $e->getMessage());

            return back()->with('error', 'NOK');
        }
    }
}
