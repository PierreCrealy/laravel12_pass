<?php

namespace App\Livewire\Credentials;

use App\Models\Associate;
use App\Models\Credential;
use App\Models\Repertory;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class CredentialIndex extends Component
{
    public Credential $credential;
    public int $credId;
    public bool $showModal = false;
    public Repertory $repertory;


    public function getCredential()
    {
        $this->credential = Credential::find($this->credId);
    }

    public function mount(Repertory $repertory)
    {
        $this->repertory = $repertory;
    }


    public function render()
    {
        $tags = Tag::all();
        $groupedCredentials = Credential::query()
            ->when($this->repertory->id, function (Builder $query) {
                return $query->where('repertory_id', $this->repertory->id);
            })
            ->orderBy('name')
            ->get()
            ->groupBy(function (Credential $credential){
                return $credential->name
                    ? Str::upper(Str::substr($credential->name, 0, 1))
                    : '#';
            });

        return view('livewire.credentials.credential-index', compact('groupedCredentials', 'tags'));
    }

    public function submit()
    {
        $this->credential->save();

        session()->flash('message', 'Utilisateur enregistré avec succès.');
    }

//    public function submit()
//    {
//        $newCredential = new Credential;
//
//        $newCredential
//            ->fill([
//                'name'  => $this->credential->name,
//                'value' => $this->credential->value,
//                'repertory_id' => $this->repertory->id,
//            ])
//            ->save();
//
//
//        foreach ($request->get('tags') as $tagKey)
//        {
//            $associatedTag = new Associate;
//
//            $associatedTag
//                ->fill([
//                    'credential_id' => $newCredential->id,
//                    'tag_id'        => $tagKey
//                ])
//                ->save();
//        }
//
//        return to_route('credentials.index')
//            ->with('success', 'Credential has created.');
//    }
}
