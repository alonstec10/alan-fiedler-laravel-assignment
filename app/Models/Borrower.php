<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_employed'
    ];

    public function bankAccount(): HasOne
    {
        return $this->hasOne(BankAccount::class);
    }

}
