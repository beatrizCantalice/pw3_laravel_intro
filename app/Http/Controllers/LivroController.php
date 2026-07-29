<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
//

class LivroController extends Controller
{
    //
    public function index()
    {
        $livros = Livro::orderBy('id')->get();
        return view('livros.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|min:1',
            'autor' => 'required|min:3|string',
            'ano_publicacao' => 'required|integer|min:1',
        ]);


        Livro::create($dados);

        return redirect('/livros');
    }
}
