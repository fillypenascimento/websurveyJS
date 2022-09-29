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
            <h3>Your Results</h3>
            <div class="panel-body">
                <a href="{{ url('/thanks') }}" class="btn btn-success">Finish</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Your Answer</th>
                            <th>Expected Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subject->questions as $question)
                        <tr>
                            <td><img id="code" src="/images/{{ $question->pivot->question_id }}.png" /></td>
                            <td>{{$question->pivot->subject_answer}} ({{$question->pivot->is_correct ? 'Correct' : 'Wrong'}})</td>
                            <td>{{$question->answer}}</td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>


        </div>

    </div>
</body>

<!-- <script type='text/javascript'>
    $(document).ready(function(){
        $("#thanks-button").click(function(){
            window.location.replace("/thanks");
        });
    });

</script> -->

</html>