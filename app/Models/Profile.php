<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Profile extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'nama','tgl_lahir','jenis_kelamin','email','alamat'
    ];
}