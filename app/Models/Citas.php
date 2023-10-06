<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $table = 'citas';

    protected $fillable = [
        'id_doctor', 'id_paciente','id_animal', 'id_medicamento', 'FyHinicio', 'FyHfinal'
    ];

    public $timestamps = false;

    // obtener el nombre del paciente
    public function PAC()
    {
        return $this->belongsTo(Pets::class, 'id_paciente');
    }

    //obtener medicamento
    public function PAC1()
    {
        return $this->belongsTo(Medicines::class, 'id_medicamento');
    }
    
    public function PAC3()
    {
        return $this->belongsTo(Doctors::class, 'id_doctor');
    }
}
