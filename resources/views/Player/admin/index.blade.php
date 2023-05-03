<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Players</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Players</h2>

    </div>

</div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">

<tr>

   <th>상세보기</th>

    <th>사진</th>
    <th>삭제</th>
   
</tr>

@foreach ($players as $player)

<tr>


    <td><a href="{{ route('adminplayers.show',$player->id) }}">{{ $player->Pname}}</a></td>

    <td><img width="20%" height="20%" src="/photos/{{ $player->photo}}" /></td> 

    <td>
        <form method="POST" action="/adminplayers/{{ $player->id }}" style="display:inline">
            @method('DELETE')
            @csrf
            <button class='btn btn-danger'>Delete</button>
        </form>
    </td>
</tr>


@endforeach

</table>

</body>
</html>