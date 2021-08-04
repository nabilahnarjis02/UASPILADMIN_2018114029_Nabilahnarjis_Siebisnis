<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Hp extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'kode_admin','nama','SMA','S1','S2','S3'
    ];
}