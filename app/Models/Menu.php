<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    // memilih tabel di db
    protected $table = 'menus';
    //memilh kolom yang tdk dapat dirubah
    protected $guarded = ['id'];

    //function yang merelasikan dgn tabel kategoris
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
