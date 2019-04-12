<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JS Survey</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">

    <!-- Styles -->

</head>

<body>

    <div class="container">

        <div class="panel panel-default" style="margin-top: 30px">
            <div class="panel-body">

                <form method="POST" action="/saveUser">
                    {{ csrf_field() }}  
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label>Occupation</label>
                        <input type="text" name="occupation" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Experience</label>
                        <input type="text" name="experience" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Degree</label>
                        <input type="text" name="degree" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" />
                    </div>

                    <button class="btn btn-success">Enviar</button>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>


        </div>
    </div>
</body>

</html>