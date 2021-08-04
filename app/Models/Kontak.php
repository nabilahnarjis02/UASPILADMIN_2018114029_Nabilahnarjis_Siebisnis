<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Kontak extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'kode_admin','no_hp'
    ];
}