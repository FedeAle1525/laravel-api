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

        $results = Project::with('type', 'technologies')->orderBy('name')->paginate(15);

        return response()->json([

            'success' => true,
            'results' => $results
        ]);
    }
}
