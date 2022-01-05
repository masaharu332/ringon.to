<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    

    
    
    
    protected $fillable = [
    'title',
    'body',
    'price',
    'tag',
    'image_path',
    'image'
];

    /**
     * Itemに紐付いたTagのリスト
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    
    public function photos()
    {
        return $this->hasMany('App\ItemPhoto');
    }
}
