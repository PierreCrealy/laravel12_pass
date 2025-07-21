<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\Credential;
use App\Http\Controllers\Controller;
use App\Models\Repertory;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CredentialController extends Controller
{

    public function index(Repertory $repertory)
    {
        $this->repertory = $repertory;

        $tags = Tag::all();
        $groupedCredentials = Credential::query()
            ->when($repertory->id, function (Builder $query) use ($repertory) {
                return $query->where('repertory_id', $repertory->id);
            })
            ->orderBy('name')
            ->get()
            ->groupBy(function (Credential $credential){
               return Str::upper($credential->title[0]);
            });

        return view('credentials.index', compact('repertory', 'groupedCredentials', 'tags'));
    }


    public function create(Repertory $repertory)
    {
        $tags = Tag::all();

        return view('credentials.create', compact('repertory', 'tags'));
    }


    public function store(Request $request)
    {
        try{
            $newCredential = Credential::findOrNew($request->get('id'));

            $image = $request->file('image');
            $storedImage = $image->move(public_path('images'), $image->getClientOriginalName());

            $newCredential
                ->fill([
                    'title'        => $request->get('title'),
                    'note'         => $request->get('note'),
                    'login'        => $request->get('login'),
                    'password'     => $request->get('password'),
                    'link'         => $request->get('link'),
                    'image'        => $storedImage ? $image->getClientOriginalName() : 'Not imported',
                    'repertory_id' => $request->get('repertory_id'),
                ])
                ->save();


            Associate::where('credential_id', $newCredential->id)->delete();

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
