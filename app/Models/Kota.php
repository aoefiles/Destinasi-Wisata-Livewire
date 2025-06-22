<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kota']; // tambahkan ini
    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    }
}