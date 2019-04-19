<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>


</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-5">

                    <div class="panel panel-body">
                        <h4>Instructions</h4>
                        <div class="alert alert-info">
                            <p>In this survey, you will be asked to predict the output of snippets of JavaScript code. The etntire survey is intended to
                            last no more than 8 minutes. For each question, you will be asked to fill in the text box with
                            the output the program would yield if it were run.
                            </p>
                            <p>Please try your best to focus for the next
                            minutes. </p>
                            <p>We suggest that you take the survey in a quiet room, and avoid any interruptions during
                            the questionaire. Since there will be no grading for the answers, feel free to mark 'I do not
                            know' if this is the case. Answer the questions using your own reasoning, and nothing else. Thank
                            you!</p>
                        </div>
                        <form method="POST" action="/survey">
                            {{ csrf_field() }}
                            <input name="subject_id" type="hidden" value="{{$subject_id}}" />
                            <div class="text-center">
                                <button class="btn btn-lg btn-success">Start</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>