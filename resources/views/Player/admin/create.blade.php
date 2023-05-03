<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New player</h2>

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

                @foreach ($errors as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

{{-- 폼 시작 --}}
<form method="POST" action="/adminplayers" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">   
            <div class="form-group">
                <strong>Pname:</strong>
                <input type="text" name="Pname" placeholder="Pname" class="form-control">
            </div> 
            @error('Pname')
                <small>{{ $message }}</small>
            @enderror      
        </div>   
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
        <div class="col-xs-12 cl-sm-12 col-md-12">    
            <div class="form-group">
                <strong>photo :</strong>
                <input type="file" name="photo" class="form-control">
            </div> 
            @error('photo')
                <small>{{ $message }}</small>
            @enderror    
        </div>      
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">     
                <button type="submit" class="btn btn-primary">Submit</button>    
        </div>  
    </div>
</form>
   
</body>
</html>
