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

        <a class="btn btn-primary" href="{{ route('adminteams.index') }}"> Back</a>

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
 
<form action="/adminteams/{{ $teams->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <label class="block" for="name">팀명</label>
    <input class="form-control @error('name') @enderror" type="text" name="name" id="name" value="{{ old('name') ? old('name') : $teams->name }}" required><br>
    @error('name')
        <small>{{ $message }}</small>
    @enderror
    
    <label class="block" for="country">국가</label>
    <textarea class="form-control @error('country') @enderror" name="country" id="country" cols="30" rows="10" required>{{ old('country') ? old('country') : $teams->country }}</textarea><br>
    @error('country')
        <small>{{ $message }}</small>
    @enderror
    
    <button class='btn btn-danger'>Submit</button>
</form>

</body>
</html>