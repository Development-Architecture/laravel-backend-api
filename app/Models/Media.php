<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'upload_user_id',
        'is_free',
        'description',
        'location',
        'media_usage_id',
        'is_active',
        'price',
        'media_type_id',
        'sub_media_type_id'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function mediaUsage()
    {
        return $this->belongsTo(MediaUsage::class);
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class);
    }

    public function subMediaType()
    {
        return $this->belongsTo(SubMediaType::class);
    }

    public function keywords()
    {
        return $this->hasMany(MediaKeyword::class);
    }

    //pivot
    public function mediaCategories()
    {
        return $this->belongsToMany(Category::class, 'media_category', 'media_id', 'category_id');
    }

    //pivot
    public function mediaKeywords()
    {
        return $this->belongsToMany(Keyword::class, 'media_keywords', 'media_id', 'keyword_id');
    }

    public function mediaFile()
    {
        return $this->hasMany(MediaFile::class);
    }

    public function originalMediaFile()
    {
        return $this->hasOne(MediaFile::class)->where('type', 'original');
    }

    public function resolutionMediaFile()
    {
        return $this->hasOne(MediaFile::class)->where('type', 'reduce_resultion');
    }

    public function waterMarkMediaFile()
    {
        return $this->hasOne(MediaFile::class)->where('type', 'water_mark');
    }

    public function scopeSearchKeyword($query, $request)
    {
        $search_categories = explode(',', $request->categories);
        return $query->whereHas('mediaKeywords', function($query) use ($request){
            $query->where('name','LIKE','%'.$request->searh_keyword.'%');
        })->orWhereHas('mediaType', function($query) use ($request){
            $query->where('id', $request->image_type_id);
        })->orWhereHas('subMediaType', function($query) use ($request){
            $query->where('id', $request->sub_image_type_id);
        })->orWhereHas('mediaCategories', function($query) use ($search_categories){
            $query->whereIn('category_id', $search_categories);
        });
    }

    public function scopeSearchImageTypeId($query, $imageTypeId)
    {
        $query->whereHas('mediaType', function($query) use ($imageTypeId){
            return $query->orWhere('id','=', $imageTypeId);
        });
    }

    public function purchases()
    {
        return $this->hasMany(UserPurchase::class);
    }
}
