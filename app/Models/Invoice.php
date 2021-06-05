<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    public function invoice_details()
    {
        return $this->hasMany('App\Models\InvoiceDetail');
    }
}
