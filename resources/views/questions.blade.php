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
        <div class="row">
            <div class="col-md-offset-2 col-md-8">  
                <div class="panel panel-default" style="margin-top: 30px">

                    <div class="panel-body">

                        <div class="text-center">
                            <h3><span id="current">1</span>/12</h3>
                            <div class="">

                                <img id="code" src="" />
                            </div><br/>
                            <form id="form" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject_answer">Expected output: </label>
                                            <input id="subject_answer" type="text" name="subject_answer" />
                                        </div>

                                        <input id="subject_time" type="hidden" name="subject_time" />
                                        <input id="order" type="hidden" name="order" />
                                        <input id="question_id" type="hidden" name="question_id" />
                                        <input id="subject_id" type="hidden" name="subject_id" value="{{$info->subject_id}}" />
                                        <input value="0" id="has_changed_page" type="hidden" name="has_changed_page" />
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" id="idk" class="btn btn-info">I do not know</button>
                                        <button id="send-button" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>



        </div>
    </div>
</body>
<?php $jsonQuestions = json_encode($info->questions)?>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#send-button").attr("disabled", true);

        $("#subject_answer").keyup(function(){
            if($("#subject_answer").val() == "" || $("#subject_answer").val() == null ){
                $("#send-button").attr("disabled", true);
            }
            else{
                $("#send-button").attr("disabled", false);
            }
        });
        var questions = {{$jsonQuestions}}
        
        var index = 0;
        $("#code").attr("src", `/images/${questions[index]}.png`);
        var start = new Date();
        $("#idk").click(function(){
            $("#subject_answer").val("");
            $("#form").submit();
        });
        $("#form").submit(function(e) {
            var end = new Date();
            $("#send-button").attr("disabled", true);
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
                    if(index>11)
                        window.location.replace("/subjectResults");
                    
                    $("#subject_answer").val("");
                    $("#current").html(index+1);
                    $("#has_changed_page").val(0);
                    $("#code").attr("src", `/images/${questions[index]}.png`);
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