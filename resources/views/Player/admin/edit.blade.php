<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Edit team</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('adminplayers.index') }}"> Back</a>

    </div>

</div>

</div>


@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
 
<form action="/adminplayer/{{ $players->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <label class="block" for="Pname">팀명</label>
    <input class="form-control @error('Pname') @enderror" type="text" name="Pname" id="Pname" value="{{ old('Pname') ? old('Pname') : $players->Pname }}" required><br>
    @error('Pname')
        <small>{{ $message }}</small>
    @enderror
    
    <div class="col-xs-12 cl-sm-12 col-md-12">      
        팀명 선택 : <br>
        <select name="team_id">
            @foreach($select AS $selected)
                <option value="{{ $selected }}">{{ $selected }}</option>
            @endforeach
        </select>
        @error('team_id')
            <small>{{ $message }}</small>
        @enderror  
    </div> 
    
    <button class='btn btn-danger'>Submit</button>
</form>

</body>
</html>