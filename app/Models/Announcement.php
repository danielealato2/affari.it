<?php

namespace App\Models;

use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory, Searchable;

    //pescami dal DB titolo descizione e prezzo.
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'is_accepted',

    ];

    //Gli annunci appartanegono alle categorie.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Gli annunci appartengona agli utenti.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    //1 annuncio ha N immagini
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $category
        ];
        return $array;
    }
}
