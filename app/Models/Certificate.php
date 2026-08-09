<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_number',
        'date',
        'user_id',
        'client_id',
        'client_name',
        'client_phone',
        'client_address',
        'client_comuna',
        'client_provincia',
        'description',
        'quantity',
        'unit_price',
        'subtotal_neto',
        'tax_type',
        'tax_amount',
        'total_price',
        'work_details',
        'gasfiter_name',
        'gasfiter_rut',
        'gasfiter_sec_class',
        'photo_1',
        'photo_2',
        'photo_3',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'unit_price' => 'decimal:2',
            'subtotal_neto' => 'decimal:2',
            'tax_amount' => 'decimal:2',
            'total_price' => 'decimal:2',
            'quantity' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total_price, 0, ',', '.');
    }

    public function getFormattedSubtotalAttribute(): string
    {
        return '$' . number_format($this->subtotal_neto, 0, ',', '.');
    }

    public function getFormattedTaxAttribute(): string
    {
        return '$' . number_format($this->tax_amount, 0, ',', '.');
    }

    public function getPhoto1UrlAttribute(): string
    {
        if ($this->photo_1) {
            return asset('storage/' . $this->photo_1);
        }
        return asset('images/logotipo-holding.png');
    }

    public function getPhoto2UrlAttribute(): string
    {
        if ($this->photo_2) {
            return asset('storage/' . $this->photo_2);
        }
        return asset('images/domingo-isain-gasfiter-sec-qr.png');
    }

    public function getPhoto3UrlAttribute(): string
    {
        if ($this->photo_3) {
            return asset('storage/' . $this->photo_3);
        }
        return asset('images/logotipo-sec.png');
    }
}
