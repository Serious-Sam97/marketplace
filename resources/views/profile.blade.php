<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>
    <h1>Perfil de {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
   
    <div>Age: {{ $user->age }}</div>
    
</body>
</html>