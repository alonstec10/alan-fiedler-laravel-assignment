<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_name'
    ];


    public function borrowers()
    {
        return $this->belongsToMany(Borrower::class);
    }
}
