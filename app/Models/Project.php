<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'client',
        'url',
        'type_id'
    ];

    protected $with = ['type:id,name', 'technologies:id,name'];

    // Indico una Relazione: Project(s) [N:1] Type, cioe' un Progetto puo' avere una sola Tipologia 
    public function type()
    {

        return $this->belongsTo(Type::class);
    }

    // Indico una Relazione: Project(s) [N:N] Technology(ies), cioe' un Progetto puo' avere piu' Tag associati
    public function technologies()
    {

        return $this->belongsToMany(Technology::class);
    }

    // Metodo che recupera da DB la Lista delleTecnologie ordinate per Nome
    public function getListTechOrderByName()
    {

        return $this->technologies()->orderBy('name')->get();
    }

    // Metodo che recupera la lista di ID delle Tecnologie associate al Progetto
    public function getListTechIds()
    {

        return $this->technologies->pluck('id')->all();
    }
}
