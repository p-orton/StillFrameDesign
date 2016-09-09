<div class="div-contact-container background-dark">
    <div class="div-contact-header">
        <h1 id="contact-header-two-lines">Create <br/> with us!</h1>
        <h1 id="contact-header-one-line">Create with us!</h1>
        <p class="contact-email">stillframedesign@gmail.com <br/> 403.477.6334 </p>
    </div>
    <div class="div-contact-form">
        <form role="form" id="contact-form" method="post" action="submit_form.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName">name</label><br/>
                <input type="text" class="form-control" id="inputName" name="name" required>
            </div>
            <div class="form-group">
                <label for="inputEmail">email</label><br/>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
<!--            <div class="form-group">
                <label for="inputSubject">subject</label><br/>
                <input type="text" class="form-control" id="inputSubject" name="subject" required>
            </div>-->
            <div class="form-group">
                <label for="inputMessage">message</label><br/>
                <textarea class="form-control" id="inputMessage" rows="1" name="message" required></textarea>
            </div>
            <input type="submit" id="contact-submit-btn" class="btn btn-default" value="SEND"></input>
        </form>
    </div>
</div>



<script>

    $(document).ready(function(){

        //validates a form before submitting
        $('#contact-form').validate({
            rules: {
                name: "required",
                message:"required",
                email: {
                    required: true,
                    email: true
                }
            },

            messages:{
                name: "please enter your name",
                message: "please enter your story",
                email: "please enter a valid email"
            },

            highlight: function (element) {
                $(element).closest('.control-group').removeClass('has-success').addClass('has-error');
            },

            success: function (element) {
                element.text('').addClass('valid')
                    .closest('.control-group').removeClass('has-error').addClass('has-success');
            },

            submitHandler: function(form){
                submitForm(form);
            }
        });


        //Submit form through AJAX
        var submitForm = function(form){

            var json = $(form).serialize();

            console.log(json);

            $.ajax({
                url: 'send_email.php',
                type: 'post',
                dataType: 'json',
                data: json,
                success: function(data){
                    //console.log(data.message);
                    //todo remove form and display confirmation message
                    //$(".content")
                },
                error: function(request, status, error){
                    console.log(JSON.parse(request.responseText).message);
                }
            });
            return false;
        };

    });
</script>