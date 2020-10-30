<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Profile extends Model implements Searchable
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('welcome', Auth::id());
        return new SearchResult($this, $this->user()->username, $url);
    }


}

