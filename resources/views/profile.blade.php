<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .profile-section {
            margin-bottom: 30px;
        }

        .profile-picture {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
            border: 4px solid #fff;
            box-shadow: 0 0 0 4px #007bff;
        }

        .profile-picture input[type="file"] {
            display: none;
        }

        .profile-picture label {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .profile-picture label:hover {
            background-color: #0056b3;
        }

        .button-wrapper {
            text-align: right;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Perfil de {{ $user->name }}</h1>

        <form action="{{ route('savephoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-section">
                <div class="profile-picture">
                    <input type="file" id="profile-image" accept="image/*" name="profile_image">
                    <label for="profile-image">
                        <i class="fas fa-user-circle"></i> Selecionar Foto
                    </label>
                    @isset($perfil)
                        <img src="{{ asset($perfil->profile_image) }}" alt="Profile Image">
                    @endisset
                </div>
                <p>Email: {{ $user->email }}</p>
                <p>Data de Nascimento: {{ $user->DateOfBirth }}</p>
            </div>

            <div class="button-wrapper">
                <button type="submit" class="button">Enviar Foto</button>
                <a href="{{ route('home') }}" class="button">Voltar para a Home</a>
            </div>
        </form>
    </div>
</body>
</html>
