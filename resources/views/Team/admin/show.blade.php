<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Team</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('adminteams.index') }}"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Team</strong>

                {{ $teams->name}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Country:</strong>

                {{ $teams->country}}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Players:</strong>
                @foreach ($players as $player)
                    {{ $player->Pname}}
                @endforeach
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>로고:</strong>
               

                <img width="20%" height="20%" src="/logos/{{ $teams->logo}}" />

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>플래그:</strong>
               

                <img width="20%" height="20%" src="/flags/{{ $teams->flag}}" />

            </div>

        </div>

    </div>


</body>
</html>
