<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //1 categoria ha N annunci.
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    //  public function announcementMaxN($n)
    //  {
    //      return $this->hasMany(Announcement::class)->take($n)->get();
    //  }
}
