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
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <!-- Styles -->

</head>

<body>

    <div class="container">

        <div class="panel panel-default" style="margin-top: 30px">
            <div class="panel-body">

                <form method="POST" action="/saveUser">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience level</label>
                        <select name="experience" class="form-control">
                            <option value="">Choose experience level</option>
                            <option value="1">Less than a year</option>
                            <option value="2">Between 1 and 4 years</option>
                            <option value="3">Between 4 and 10 years</option>
                            <option value="4">Over than 10 years</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="degree">Education level</label>
                        <select name="degree" class="form-control">
                            <option value="">Select education level</option>
                            <option value="1">High school degree or equivalent</option>
                            <option value="2">Some university course but no degree</option>
                            <option value="3">Bachelor degree</option>
                            <option value="4">Master degree</option>
                            <option value="5">PhD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" />
                    </div>
                    <div class="alert alert-danger">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-check">
                                    <input id="agree" type="checkbox" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-11">
                                By checking this box you agree to have your answers reviewed and used to the purpose of the research. You won't be identified,
                                and your email will only be used to raffle an $20 amazon gift.
                            </div>
                        </div>
                    </div>
                    <button disabled id="confirm" class="btn btn-success">Confirm</button>
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
<script>
    $(document).ready(function(){
    $("#agree").click(function(){
        if($(this).is(":checked")){
            $("#confirm").attr("disabled", false);
        }
        else{
            $("#confirm").attr("disabled", true);
        }
    })
});

</script>

</html>