<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function show(string $cep)
    {
        // Remove caracteres especiais caso o usuário digite com hífen
        $cepLimpo = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cepLimpo) !== 8) {
            return response()->json(['error' => 'CEP inválido'], 400);
        }

        // Faz a requisição HTTP para a API do ViaCEP
        $response = Http::withoutVerifying()->get("https://viacep.com.br/ws/{$cepLimpo}/json/");

        if ($response->failed() || isset($response->json()['erro'])) {
            return response()->json(['error' => 'CEP não encontrado'], 404);
        }

        return response()->json($response->json());
    }
}
