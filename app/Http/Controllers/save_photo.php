<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDirectory = 'caminho/para/pasta/de/imagens/'; 
    $targetFile = $targetDirectory . basename($_FILES['profile-image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['profile-image']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    

    if ($uploadOk == 0) {
      
        $response = ['success' => false, 'message' => 'Erro no upload da foto de perfil.'];
    } else {
        if (move_uploaded_file($_FILES['profile-image']['tmp_name'], $targetFile)) {
         
            $response = ['success' => true, 'message' => 'Foto de perfil enviada com sucesso.'];
        } else {
         
            $response = ['success' => false, 'message' => 'Erro ao salvar a foto de perfil.'];
        }
    }

    echo json_encode($response);
} else {
  
    header('HTTP/1.0 405 Method Not Allowed');
    exit('Method Not Allowed');
}
