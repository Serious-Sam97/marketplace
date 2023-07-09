<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function savePhoto(Request $request)
    {
        // Verifique se uma imagem foi enviada
        if ($request->hasFile('profile_image')) {
            // Salve a imagem no diretório de destino
            $path = $request->file('profile_image')->store('profile_images', 'public');

            // Atualize o caminho da imagem no modelo do usuário
            $user = Auth::user();
            $user->profile_image_path = $path;
            $user->save();

            // Retorne uma resposta de sucesso ou redirecione para a página de perfil
            return redirect()->back()->with('success', 'Foto de perfil enviada com sucesso.');
        }

        // Se não foi enviada uma imagem, retorne uma resposta de erro
        return redirect()->back()->with('error', 'Nenhuma imagem foi enviada.');
    }
}
