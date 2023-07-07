<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Driver\AbstractMySQLDriver;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}

 function showAge($id)
{
    $user = DB::table('users')->where('age', $age)->first();


    return view('profile.age', ['user' => $user]);
}
$connection = DB::connection();
$schemaManager = $connection->getDoctrineSchemaManager();
$tableColumns = $schemaManager->listTableColumns('users');

if (isset($tableColumns['age'])) {
    $columnDefinition = $tableColumns['age'];
    $columnType = $columnDefinition->getType();
    $columnTypeClass = get_class($columnType);
    
    if ($columnTypeClass === 'Doctrine\DBAL\Types\DateType') {
        // A coluna 'age' é do tipo DateType
        
        // Obter a data de nascimento do usuário
        $birthDate = // Obtenha a data de nascimento do usuário da tabela 'users'
        
        // Calcular a idade
        $now = new \DateTime();
        $age = $now->diff($birthDate)->y;
        
        // Exibir a idade
        echo "A idade do usuário é: " . $age;
    }
}


