<div class="project-container">

    <div class="dynamic-load hide-on-load container-light" data-order="1">

        <div class="div-project-header">
            <picture>
                <source srcset="img/A2000x1125.png" media="(min-width: 1600px)">
                <source srcset="img/A1600x900.png" media="(min-width: 1200px)">
                <source srcset="img/A1200x900.png" media="(min-width: 800px)">
                <source srcset="img/A800x600.png" media="(min-width: 450px)">
                <img srcset="img/A450x330.png" alt="Header Stephanie Butler Portfolio" class="img-center img-project-header">
            </picture>
        </div>

        <div class="project-title">
            <h3>STEPHANIE BUTLER</h3>
        </div>

        <div class="project-type">
            <div class="float-left">
                <p>SERVICES<br/>Website</p>
            </div>
            <div class="float-right">
                <p>YEAR<br/>2014</p>
            </div>
        </div>

        <div class="project-description">
            <p>
                A custom portfolio for information designer Stephanie Butler,
                with a minimal layout that allows the projects to be the hero.
                The home page displays a collection of works, represented by
                black and white mockups. Hovering over an image transitions
                it to color, drawing focus while maintaining subtlety.
            </p>

            <!--The about page was rewritten, condensing the original
            thoughts into more concise statements. The visual layout of
            the text draws attention to the process, and creates a strong sense of flow. <br/><br/>-->

            <p>
                Individual project pages are generated dynamically and can
                be easily managed through a simple and secure back end portal.
            </p>
        </div>
    </div>

    <div class="div-img-overlay dynamic-load hide-on-load" data-order="2">
        <!--<img class="img-center background-dark margin-bottom-40" src="img/about.png">-->

        <picture>
            <source srcset="img/B2000x1125.png" media="(min-width: 1600px)">
            <source srcset="img/B1600x900.png" media="(min-width: 1200px)">
            <source srcset="img/B1200x900.png" media="(min-width: 800px)">
            <source srcset="img/B800x600.png" media="(min-width: 450px)">
            <img srcset="img/B450x330.png" alt="Example 01 Stephanie Butler Case Study"
                 class="img-center container-dark margin-bottom-40">
        </picture>

        <p class="project-overlay-text font-light">
             Description page is simple, with minimal information and a few photos,
             which allows the reader to focus on each image one by one.
        </p>
    </div>

    <div class="project-sub-header dynamic-load hide-on-load" data-order="3">
        <p class="project-overlay-text">
            Professional mockups are used to create
            interest and make the site more dynamic.
        </p>
        <div class="div-img-stagger">
            <img src="img/ipad_1.png">
            <img src="img/ipad_2.png">
            <img src="img/ipad_3.png">
        </div>
    </div>


    <div class="div-img-overlay dynamic-load hide-on-load" data-order="4">
        <p class="project-overlay-text font-light">
            The visual layout of the text draws attention to the process,
            and creates a strong sense of flow.
        </p>
        <picture>
            <source srcset="img/D2000x1125.png" media="(min-width: 1600px)">
            <source srcset="img/D1600x900.png" media="(min-width: 1200px)">
            <source srcset="img/D1200x900.png" media="(min-width: 800px)">
            <source srcset="img/D800x600.png" media="(min-width: 450px)">
            <img srcset="img/D450x330.png" alt="Example 03 Stephanie Butler Case Study"
                 class="img-center container-dark">
        </picture>
    </div>

    <div class="loader-container-dark hidden">
        <span></span><span></span>
    </div>

    <?php include 'connect_button.php'; ?>
</div>


<script>
    //Set default menu color
    $(document).ready(function(){

        setButtonsDark();

        //Hide contact button for mobile
        if(window.innerHeight < 780){
            $(".a-contact").hide();
            console.log("hidden");
        }
    });


</script>