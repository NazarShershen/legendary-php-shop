<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artifact extends Model
{
    protected $fillable = [
        'title',
        'description',
        'attributes',
        'modifiers',
        'price',
        'image',
    ];

    protected $casts = [
        'attributes' => 'collection',
        'modifiers' => 'collection',
        'price' => 'float',
    ];

    public function getTitleAttribute($value)
    {
        return html_entity_decode($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = htmlentities($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = htmlentities($value);
    }

    public function getDescriptionAttribute($value)
    {
        return html_entity_decode($value);
    }

    public function getImageUrl()
    {
        return Storage::disk('public')->url('images/artifacts/' . $this->image);
    }
}
