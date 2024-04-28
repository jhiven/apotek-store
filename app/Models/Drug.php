<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drug extends Model
{
  use HasFactory;

  protected $fillable = [
    'nama',
    'kegunaan',
    'indikasi',
    'jenis',
    'dosis',
    'harga',
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
