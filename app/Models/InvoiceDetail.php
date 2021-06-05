<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoice_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'lesson_id',
        'lesson_fee'
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
