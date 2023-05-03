<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New team</h2>

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

                @foreach ($errors as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


{{-- 폼 시작 --}}
    <form method="POST" action="/adminteams" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">   
                <div class="form-group">
                    <strong>Team:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div> 
                @error('name')
				    <small>{{ $message }}</small>
			    @enderror      
            </div>     
            <div class="col-xs-12 col-sm-12 col-md-12">      
                <div class="form-group">      
                    <strong>Country:</strong>
                    <input type="text" name="country" placeholder="Country" class="form-control">
                </div> 
                @error('country')
				    <small>{{ $message }}</small>
			    @enderror        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">    
                <div class="form-group">
                    <strong>Flag:</strong>
                    <input type="file" name="flag" class="form-control">
                </div> 
                @error('flag')
				    <small>{{ $message }}</small>
			    @enderror    
            </div>      
            <div class="col-xs-12 col-sm-12 col-md-12">    
                <div class="form-group">
                    <strong>Logo:</strong>
                    <input type="file" name="logo" class="form-control"> 
                </div>   
                @error('logo')
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
