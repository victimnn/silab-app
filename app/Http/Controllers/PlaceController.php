<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

/**
 * Controlador para gerenciar as operações relacionadas aos locais (Places).
 * 
 * Este controlador lida com as operações de exibição, criação e armazenamento de locais.
 */
class PlaceController extends Controller
{
    /**
     * Exibe uma lista de todos os locais.
     * 
     * Este método recupera todos os registros de locais da base de dados e
     * os envia para a visualização 'Places/table'.
     * 
     * @return \Illuminate\View\View A visualização com a lista de locais.
     */
    public function index()
    {
        // Recupera todos os locais da base de dados
        $places = Place::all();

        // Exibe os dados de locais para debug (deve ser removido em produção)
        //dd($places);

        // Retorna a visualização com os locais
        return view('Places/table', ['places' => $places]);
    }

    /**
     * Exibe o formulário para criação de um novo local.
     * 
     * Este método retorna a visualização do formulário para inserir os dados
     * de um novo local.
     * 
     * @return \Illuminate\View\View A visualização do formulário de criação.
     */
    public function create()
    {
        return view('Places/form');
    }

    /**
     * Armazena um novo local na base de dados.
     * 
     * Este método recebe os dados do formulário, cria um novo objeto Place
     * com esses dados e o salva na base de dados.
     * Após a criação do local, o usuário é redirecionado para a página inicial.
     * 
     * @param \Illuminate\Http\Request $request Os dados enviados pelo formulário.
     * 
     * @return \Illuminate\Http\RedirectResponse Um redirecionamento para a página inicial.
     */
    public function store(Request $request)
    {
        // Cria um novo objeto Place e define seus atributos com os dados do formulário
        $place = new Place();
        $place->name = $request->name;
        $place->description = $request->description;
        $place->capacity = $request->capacity;

        // Salva o novo local na base de dados
        $place->save();

        // Redireciona o usuário para a página inicial após o armazenamento
        return redirect()->back()->with('success', 'Lab Cadastrado!');
        // Retorno comentado: Pode-se utilizar uma resposta JSON em vez de redirecionamento, se necessário.
        // return response()->json($place);
    }

    public function destroy($id){
        $place = PLace::findOrFail($id);
        $place ->delete();
        return redirect('/places');
    }

    public function edit($id){
        $place = PLace::findOrFail($id);
        return view('Places/form',['place'=>$place]);
    }

    public function update(Request $request){
        $place = Place::findOrFail($request->id);

        $place -> name = $request -> name;
        $place -> description = $request -> description;
        $place -> capacity = $request -> capacity;

        $place -> save();

        return redirect('/places');
    }
}
