<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    
    //memilih table dalam db
    protected $table = 'kategoris';
    //memilih kolom yang tidak bisa diubah
    protected $guarded = ['id'];

    //function yang merelasikan dengan tabel menu
    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
