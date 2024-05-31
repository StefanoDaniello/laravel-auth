<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'content',
        'slug',
    ];
    public static function generateSlug($title)
    {
        //esso sostituisce gli spazi con "-"
        $slug = Str::slug($title, '-');
        $count = 1;
        //controllo se esiste un slug(titolo) con lo stesso slug(titolo)
        //viene aggiunto -
        // 'slug'-> campo db
        // $slug->titolo
        while (Post::where('slug', $slug)->first()) {
            // $slug = Str::slug($title . '-' . $count . '-');
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
