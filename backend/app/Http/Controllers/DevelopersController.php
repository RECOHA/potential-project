<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DevelopersController extends Controller
{
    /**
     * Retorna todos os desenvolvedores cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = DB::table('developers')->get();

        return response()->json($developers, 200);
    }

    /**
     * Faz a validação e o cadastro das informações.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'            => 'required|min:3|max:80',
            'sexo'            => 'required|size:1',
            'idade'           => 'required|integer',
            'hobby'           => 'required|max:60',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Dados inválidos, por favor, corrigir e enviar novamente.'], 400);
        }

        DB::table('developers')->insert($request->all());

        return response()->json(['message' => 'Desenvolvedor cadastrado com sucesso.'], 201);
    }

    /**
     * Retorna as informações de um único desenvolvedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Verifica se o desenvolvedor está cadastado.
        if (!$developer = DB::table('developers')->where('id', $id)->get()) {
            return response()->json(['message' => 'Desenvolvedor não encontrado.'], 404);
        }

        return response()->json($developer, 200);
    }

    /**
     * Atualiza os dados de um desenvolvedor específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Verifica se o desenvolvedor está cadastado.
        if (!DB::table('developers')->where('id', $id)->get()) {
            return response()->json(['message' => 'Desenvolvedor não encontrado.'], 404);
        }

        // Validações.
        $validator = Validator::make($request->all(), [
            'nome'            => 'required|min:3|max:80',
            'sexo'            => 'required|size:1',
            'idade'           => 'required|integer',
            'hobby'           => 'required|max:60',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Dados inválidos, por favor, corrigir e enviar novamente.'], 400);
        }

        // Atualiza o desenvolvedor.
        if (DB::table('developers')->where('id', $id)->update($request->all())) {
            return response()->json(['message' => 'Não foi possível atualizar o desenvolvedor.'], 400);
        }

        return response()->json(['message' => 'Desenvolvedor atualizado com sucesso.'], 200);
    }

    /**
     * Apaga um determinado desenvolvedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Verifica se o desenvolvedor está cadastado.
        if (!DB::table('developers')->where('id', $id)->get()) {
            return response()->json(['message' => 'Desenvolvedor não encontrado.'], 404);
        }

        if (!DB::table('developers')->where('id', $id)->delete()) {
            return response()->json(['message' => 'Não foi possível excluir o desenvolvedor.'], 400);
        }

        return response()->json(['message' => 'Desenvolvedor excluído.'], 204);
    }
}