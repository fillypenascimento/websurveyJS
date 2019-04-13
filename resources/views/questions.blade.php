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

                <div class="text-center">
                    <h3 id="exemplo"></h3>
                    <img id="code" src="https://raw.githubusercontent.com/abhisheksoni27/code-snipper/master/examples/index.js.png" /><br/>
                    <form id="form" method="POST">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="subject_answer" rows="4" cols="50"></textarea>

                            <input id="subject_time" type="hidden" name="subject_time" />
                            <input id="order" type="hidden" name="order" />
                            <input id="question_id" type="hidden" name="question_id" />
                            <input id="subject_id" type="hidden" name="subject_id" value="{{$info->subject_id}}" />
                            <input value="0" id="has_changed_page" type="hidden" name="has_changed_page" />
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success">Send</button>
                            <button class="btn btn-info">I have no idea</button>
                        </div>
                    </div>
                </form>
                </div>


            </div>


        </div>
    </div>
</body>
<?php $jsonQuestions = json_encode($info->questions)?>
<script type='text/javascript'>
    
    $(document).ready(function(){
        
        var questions = {{$jsonQuestions}}
        
        var index = 0;
        $("#exemplo").html(questions[index]);
        var start = new Date();
        
        $("#form").submit(function(e) {
            var end = new Date();
            $("#subject_time").val((end-start)/1000);
            $("#order").val(index);
            $("#question_id").val(questions[index]);
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: '/submitAnswer',
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    index = index+1;
                    $("#exemplo").html(questions[index]);
                    start = new Date();
                }
                });
        });
        $(window).blur(function() {
            $("#has_changed_page").val(1);
        });

    });

</script>

</html>