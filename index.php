<?php include 'head.php'; ?>

<div id="title-container" class="background-dark">

    <picture>
        <source srcset="img/front2000.png" media="(min-width: 1600px)">
        <source srcset="img/front1600.png" media="(min-width: 1200px)">
        <source srcset="img/front1200.png" media="(min-width: 800px)">
        <source srcset="img/front800.png" media="(min-width: 450px), (min-height: 675px)">
        <img srcset="img/front450.png" alt="Still Frame Design Home Page">
    </picture>

    <div id="div-title-slogan">
        <hr id="hr-title"></hr>
        <div id="div-title">
            <h1>STILL FRAME DESIGN</h1>
        </div>
        <div id="div-slogan">
            <p>A thoughtful approach to branding <br/> and web development.</p>
        </div>
    </div>

    <div id="div-scroll-icon">
        <div id="div-scroll-inner">
        </div>
    </div>

</div>

<a href="stephanie_butler.php">
    <div class="div-feature feature-01 background-dark">

        <p class="overlay-text font-light">
            WEB DESIGN <br/>
            stephanie butler
        </p>

        <picture>
            <source srcset="img/SB2000.png" media="(min-width: 1600px)">
            <source srcset="img/SB1600.png" media="(min-width: 1200px)">
            <source srcset="img/SB1200.png" media="(min-width: 800px)">
            <source srcset="img/SB800.png" media="(min-width: 450px)">
            <img srcset="img/SB450.png" alt="Stephanie Butler portfolio feature image">
        </picture>
    </div>
</a>


<!--    <a href="stephanie_butler.php">
        <div class="div-feature feature-02 background-dark">

            <p class="overlay-text font-light">
                BRANDING <br/>
                silvertree structural
            </p>

            <picture>
                <source srcset="img/bridge_1600.jpg" media="(min-width: 1200px)">
                <source srcset="img/bridge_1200.jpg" media="(min-width: 800px)">
                <source srcset="img/bridge_800.jpg" media="(min-width: 450px)">
                <img srcset="img/bridge_450.jpg" alt="Stephanie Butler portfolio feature image">
            </picture>
        </div>
    </a>-->

<script>
    // Logos are always light on the home page
    // So remove the functionality that checks for color changes
    $(document).ready(function(){
        $(".div-logo").removeClass("can-change-color");
        setButtonsLight();
    });
</script>


<?php include 'connect_button.php'; ?>
<?php include 'foot.php'; ?>