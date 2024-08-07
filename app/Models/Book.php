<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'publisher_id', 'price', 'quantity', 'published_year', 'status'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function borrowTransactions()
    {
        return $this->hasMany(BorrowTransaction::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}