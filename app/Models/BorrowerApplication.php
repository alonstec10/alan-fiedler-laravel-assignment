<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerApplication extends Model
{
    use HasFactory;

    protected $table = 'borrower_loan_application';
}
