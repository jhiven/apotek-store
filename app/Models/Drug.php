<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property string $image_url
 * @property string $nama
 * @property string $deskripsi
 * @property string $indikasi
 * @property string $jenis
 * @property string $dosis
 * @property int $harga
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $cart
 * @property-read int|null $cart_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetailTransaction> $detailTransactions
 * @property-read int|null $detail_transactions_count
 * @method static \Database\Factories\DrugFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereIndikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug wheredeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
      'nama',
      'deskripsi',
      'indikasi',
      'jenis',
      'dosis',
      'harga',
      'stok',
      'image_url',
    ];

    public function detailTransactions(): HasMany
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

}
