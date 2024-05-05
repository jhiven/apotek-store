<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $drug_id
 * @property int $quantity
 * @property int $subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Drug $drug
 * @property-read \App\Models\Transaction $transaction
 * @method static \Database\Factories\DetailTransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'subtotal',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }
}
