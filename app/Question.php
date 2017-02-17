<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{	
	protected $fillable = ['title', 'content', 'category_id', 'date', 'status', 'abstract'];

    public function category()
	{
	    return $this->belongsTo(Category::class);
	}

	public function user()
	{
	    return $this->belongsTo(User::class);
	}

    public function scopePublished($query)
    {
       return $query
              ->where('status', '=', 'published')
              ->latest('date', 'DESC');
    }

	public function setCategoryIdAttribute($value){

    	//nom de la méthode doit tjrs être écrit comme ça pour catgegory_id
    	//$attr = $this->attributes['category_id'];
    	
    	($value == 0)? $this->attributes['category_id'] = null : $this->attributes['category_id'] = $value;
    }

    public function setDateAttribute($value){
    	
    	($value == 'on')? $this->attributes['date'] = Carbon::now() : $this->attributes['date'] = null;
    }

    public function getDateAttribute($date){
    	
      if ($date != null)
      {
        return Carbon::parse($date)->format('d/m/Y');
      }

    }
}
