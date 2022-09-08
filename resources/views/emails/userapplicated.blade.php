<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        Корисникот <b>{{$application->user->name}} {{$application->user->surname}}</b> аплицираше
        на <b>{{$application->project->name}}</b>, негови
        вештини се следниве:</p>
    <ul>
        @foreach($application->user->skills as $skill)
        <li>{{ $skill->name }}</li>
        @endforeach
    </ul>
    <p>„{{ $application->description }}“</p>

</body>

</html>
