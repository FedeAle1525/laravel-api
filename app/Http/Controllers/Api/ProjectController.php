<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Metodo che servira' all'API per recuperare tutti i Progetti dal DB
    public function index()
    {

        $results = Project::orderBy('name')->paginate(15);

        return response()->json([

            'success' => true,
            'results' => $results
        ]);
    }

    // Metodo che servira' all'API per recuperare un specifico Progetto (tramite slug) dal DB
    public function show($slug)
    {
        // Faccio chiamata al Server recuperando solo il Post con Slug identico a quello arrivato da chiamata Axios
        // Con il metodo 'first' recupero istanza del Primo Elemento, in questo caso anche unico, utile per non avere una Collection di un solo elemento con il metodo 'get'
        $project = Project::where('slug', $slug)->first();

        // Controllo: Se l'elemento viene trovato lo mando come risposta in formato JSON, altrimenti mando una risposta per gestire 'errore'
        if ($project) {

            return response()->json([

                'success' => true,
                'results' => $project
            ]);
        } else {

            return response()->json([

                'success' => true,
                'error' => 'Nessun Progetto trovato'
            ]);
        }
    }
}
