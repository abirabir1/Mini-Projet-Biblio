<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class Book extends Model
{
    protected $fillable = ['title', 'author', 'description', 'year_published', 'pdf', 'cover', 'user_id', 'uuid', 'qrcode'];

    protected $appends = ['qrcode_path', 'cover_path', 'pdf_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getQrcodePathAttribute()
    {
        return url('/') . '/'.$this->qrcode;
    }
    public function getCoverPathAttribute()
    {
        return url('/storage/') . '/'.$this->cover;
    }
    public function getPdfPathAttribute()
    {
        return url('/storage/') . '/'.$this->pdf;
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            $book->uuid = Str::uuid();
            if (auth()->check()) {
                $book->user_id = auth()->id();
            }
        });

        static::saved(function ($book) {
            if ($book->pdf != null) {
                $name = $book->uuid . '.svg';
                $qrcode = QrCode::size(200)->generate(route('books.show', ['uuid' => $book->uuid]),public_path('qrcodes/'.$name));

                $book->qrcode ='qrcodes/'.$name;
                $book->saveQuietly();
            }
        });
    }
}
