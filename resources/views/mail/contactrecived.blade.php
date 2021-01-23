<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Caro Commendatore!</h1>
    <h2>C'è una nuova prenotazione per lei</h2>
    <ul>
        <li>nome: {{$bag['name']}}</li>
        <li>email: {{$bag['email']}}</li>
            
        <li>Referenza: {{$bag['reference']}}</li>
    </ul>

</body>
</html>