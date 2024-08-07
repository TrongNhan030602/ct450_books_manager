<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowTransaction extends Model
{
    protected $fillable = ['user_id', 'book_id', 'borrow_date', 'return_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }
}