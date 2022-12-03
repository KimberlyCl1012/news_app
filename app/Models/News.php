<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'id_user',
        'id_new'
    ];

    public function viewsTable()
    {
      return $this->morphTo();
    }

    public function users()
    {
      return $this->belongsTo(User::class, 'id_user');
    }

    public function news()
    {
      return $this->belongsTo(News::class, 'id_new');
    }
}
