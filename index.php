<?php include 'head.php'; ?>

<div id="index-container">
    <div id="title-container" class="container-dark dynamic-load hide-on-load" data-order="1">

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
            <div id="div-slogan" class="slogan-with-break">
                <p>A thoughtful approach to branding <br/> and web development.</p>
            </div>
            <div id="div-slogan" class="slogan-without-break">
                <p>A thoughtful approach to branding and web development.</p>
            </div>
        </div>

        <div id="div-scroll-icon">
            <div id="div-scroll-inner">
            </div>
        </div>

    </div>

    <div id="div-about-container" class="hide-on-load dynamic-load" data-order="2">
        <div id="bio-container">
            <div class="about-bio">
                <img src="http://placehold.it/150x200">
                <p>stephanie butler</p>
                <p>creative director</p>
                <a href="stephaniebutler.works"><input type="button" value="Portfolio" id="button-connect"></a>
            </div>
            <div class="about-bio">
                <img src="http://placehold.it/150x200">
                <p>paul orton</p>
                <p>technical director</p>
                <a href="paulorton.works"><input type="button" value="Portfolio" id="button-connect"></a>
            </div>
        </div>
        <div id="div-about">
            <p>
                create . simplify . engage
            </p>
        </div>
    </div>

    <a href="stephanie_butler.php" >
        <div class="div-feature feature-01 container-light dynamic-load hide-on-load" data-order="3">

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

    <div class="loader-container-light hidden">
        <span></span><span></span>
    </div>

    <script>
       //Set default menu colour for home page
       $(document).ready(function(){
            setButtonsLight();
        });
    </script>

    <?php include 'connect_button.php'; ?>
</div>

<?php include 'foot.php'; ?>