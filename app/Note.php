<?php

namespace App;
use App\Scopes\FilterSearchScope;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use FilterSearchScope;

    protected $fillable = ['name', 'content'];

    public $searchColumns = ['name', 'content'];



    public function scopeLatestFirst($query){
        return $query->orderBy('id', 'desc');
    }
}
