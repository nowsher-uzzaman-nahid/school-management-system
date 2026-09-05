<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeInvoice extends Model
{
    protected $fillable = [
        'student_id',
        'fee_type_id',
        'academic_year_id',
        'amount',
        'discount',
        'fine',
        'due_date',
        'status',
        'month',
    ];

    protected $casts = [
        'amount'   => 'decimal:2',
        'discount' => 'decimal:2',
        'fine'     => 'decimal:2',
        'due_date' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function feeType(): BelongsTo
    {
        return $this->belongsTo(FeeType::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // Net payable after discount and fine
    public function getNetAmountAttribute(): float
    {
        return $this->amount - $this->discount + $this->fine;
    }

    // Total amount paid so far across all payments
    public function getTotalPaidAttribute(): float
    {
        return $this->payments->sum('amount_paid');
    }

    // Gives Filament a clean display title for global search
    public function getRecordTitleAttribute(): string
    {
        return $this->student->user->name . ' — ' . $this->feeType->name;
    }
}
