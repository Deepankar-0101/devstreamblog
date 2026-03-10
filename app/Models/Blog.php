<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blogers;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
     public function tags()
     {
        return $this->belongsToMany(Tag::class);
      }
      public function tag(string $name): void{
        $tag = Tag::firstOrCreate(['name'=>$name]);
        $this->tags()->attach($tag);
      }
    public function blogers(){
        return $this->belongsTo(Blogers::class);
    }
}
