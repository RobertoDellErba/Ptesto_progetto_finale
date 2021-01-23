<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Announcement;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'body', 'price','category_id','location_id'];

    

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    static public function ToBeRepristinatedCount(){
        return Announcement::where('is_accepted', false)->count();
    }

    public function toSearchableArray(){

        $array=[

            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body          
        ];

        return $array;

    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }




}


