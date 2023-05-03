<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
   
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Teams</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('adminteams.create') }}"> Create New Team</a>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">
           <th>Team</th>
            <th>Country</th>
            <th>Flag</th>
            <th>Logo</th>
            <th>Action</th>

<tr>

    @foreach ($teams as $team)

    <tr>

        
        <td>{{ $team->name}}</td>

        <td>{{ $team->country}}</td>

        <td><img width="30%" height="30%" src="/flags/{{ $team->flag}}" /></td>

         <td><img width="20%" height="20%" src="/logos/{{ $team->logo}}" /></td> 
       
         <td>

<a href="{{ route('adminteams.show',$team->id) }}">Show</a>

<a  href="{{ route('adminteams.edit',$team->id) }}">Edit</a>


<form method="POST" action="/adminteams/{{ $team->id }}" style="display:inline">
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