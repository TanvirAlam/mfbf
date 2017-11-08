<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'deleted_at', 'processed_at'];

    protected $guarded = ['id', 'user_id', 'bank_transaction_id', 'paid_to', 'amount', 'status'];


    /* Relationship */
    /**
     * A transaction can have multiple categories
     */
    public function transactionCategory()
    {
        $this->hasMany(TransactionCategory::class,'category_id','id');
    }

}
