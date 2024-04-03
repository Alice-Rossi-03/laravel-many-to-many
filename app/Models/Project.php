<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cover', 'slug', 'type_id'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class);
    }

    public function technologies(): BelongsToMany{
        return $this->belongsToMany(Technology::class); 
    }
}
