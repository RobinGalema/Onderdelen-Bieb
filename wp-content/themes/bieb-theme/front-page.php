<?php get_header();?>


<main id="main-primary">
    <section id="home-landing">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h2 class="text-dark">Selecteerd een hoofdcategorie:</h2>
                    <ul>
                        <li><a href="<?php echo home_url();?>/category/header/">Header</a></li>
                        <li><a href="<?php echo home_url();?>/category/pagina-onderdelen/">Pagina Onderdelen</a></li>
                        <li><a href="<?php echo home_url();?>/category/footer/">Footer</a></li>
                        <li><a href="<?php echo home_url();?>/category/animaties/">Animaties</a></li>
                    </ul>
                    <h4><i>of</i></h4>
                    <a href="<?php echo home_url();?>/categorieen/">Bekijk alle categorieen</a>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer();?>

<main>