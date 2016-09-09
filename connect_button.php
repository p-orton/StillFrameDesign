<div class="div-contact-footer background-dark hide-on-load">
    <a href="contact.php">
        <input type="button" value="CONNECT" id="button-connect">
    </a>
</div>

<script>
    $(document).ready(function(){
       $("#button-connect").click(function(){
           openContactForm();
           return false;
       });
    });
</script>
