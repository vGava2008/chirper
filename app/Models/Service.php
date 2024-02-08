<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;


class Service extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'description',
    ];

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function brand ()
    {
        return $this->belongsTo(Brand::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function images ()
    {
        //
    }

    public function socials ()
    {
        //
    }

    public function meta ()
    {
        //
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'description';
    }

    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'description' => (String) $this->description,
        ];
    }



}
