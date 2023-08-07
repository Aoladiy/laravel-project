<?php

namespace App\Models;

use App\Contracts\Services\ImagesServiceContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public const STORAGE_DISK = 'public';
    protected $fillable = ['path'];

    public function url(): Attribute
    {
        $imagesServiceContract = app(ImagesServiceContract::class);
        return Attribute::get(fn() => $this->path ?
            $imagesServiceContract->url($this->path) : null);
    }
}
