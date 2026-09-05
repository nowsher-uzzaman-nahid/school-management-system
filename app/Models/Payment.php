<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'fee_invoice_id',
        'amount_paid',
        'paid_at',
        'method',
        'transaction_id',
        'received_by',
        'notes',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'paid_at'     => 'date',
    ];

    public function feeInvoice(): BelongsTo
    {
        return $this->belongsTo(FeeInvoice::class);
    }

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
