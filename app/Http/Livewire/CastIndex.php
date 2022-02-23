<?php

namespace App\Http\Livewire;

use App\Models\Cast;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class CastIndex extends Component
{
    use WithPagination;
    public $castTMDBId;
    public $castsName;
    public $castPosterPath;
    public function generateCast()
    {
        $newCast=Http::get('https://api.themoviedb.org/3/person/'. $this->castTMDBId .'?api_key=6609e79a8efd216f7c0cbb208f0cf3da')->json();
        $cast=Cast::where('tmdb_id',$newCast['id'])->first();
        if(!$cast)
        {
            Cast::create([
                'tmdb_id'=>$newCast['id'],
                'name'=>$newCast['name'],
                'slug'=>Str::slug($newCast['name']),
                'poster_path'=>$newCast['profile_path']
            ]);
            return redirect()->route('admin.casts.index');
        }
        else{
            return redirect()->route('admin.casts.index');
        }
       
        $this->reset();
        
    }

    public function render()
    {
        return view('livewire.cast-index',[
            'casts'=>Cast::paginate(5)
        ]);
        
    }
}
