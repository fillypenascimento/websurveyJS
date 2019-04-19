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

        @foreach ($subjects as $subject)

        <div class="panel panel-default" style="margin-top: 30px">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="5">Subject {{$subject->id}}</tr>
                        <tr>
                            <th>Question</th>
                            <th>Is Atom</th>
                            <th>Time</th>
                            <th>Has Changed Page</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subject->questions as $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td>{{$question->is_atom ? 'Yes' : 'No'}}</td>
                            <td>{{$question->pivot->subject_time}}</td>
                            <td>{{$question->pivot->has_changed_page ? 'Yes' : 'No'}}</td>
                            <td>{{$question->pivot->subject_answer}}</td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>


        </div>
        @endforeach

    </div>
</body>

</html>