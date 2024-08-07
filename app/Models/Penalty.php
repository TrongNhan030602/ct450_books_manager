<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $fillable = ['user_id', 'borrow_transaction_id', 'amount', 'reason'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrowTransaction()
    {
        return $this->belongsTo(BorrowTransaction::class);
    }
}