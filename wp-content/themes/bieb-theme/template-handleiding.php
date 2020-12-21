<?php //Template name: Handleiding ?>
<?php get_header();?>

<main id="main-primary">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title();?></h1>

                    <?php get_template_part('includes/section','content');?>
                </div>
            </div>
        </div>
    </section>

    <section id="accordions">
        <div class="container collapse-container">
            <h4 class="mb-3 ml-2"><strong>Algemeen & Bieb</strong></h4>
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx2" role="tablist" aria-multiselectable="true">

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo2"
                            aria-expanded="false" aria-controls="collapseTwo1">
                            <h5 class="mb-0">
                                Standaard Lay-Out <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                        data-parent="#accordionEx2">
                        <div class="card-body">
                            <p>De onderdelen in de bieb en vooral het template maken gebruik van een specifieke opbouw
                                van HTML pagina's. Veel van de onderdelen zijn gemaakt op een manier dat deze makkelijk
                                in deze opbouw toegevoegd kunnen worden. In het onderstaande codeblok is een voorbeeld
                                van deze opmaak te zien:</p>
                            <script src="https://gist.github.com/RobinGalema/c681f87f18f975e66af91eb1506a4847.js">
                            </script>
                            <p>
                                Het is bij deze lay-out belangrijk dat elk deel van de site zijn eigen <code> section
                                </code> krijgt en dat deze <code> section </code> ook een uniek ID krijgt waarmee de
                                content van het blok beschreven wordt. Omdat Bootstrap wordt gebruikt, volgt een
                                container met daarin een <code> row </code> en vervolgens een of meerdere gekozen <code>
                                    col </code> classes. Deze kunnen vervolgens gevuld worden met content.
                            </p>
                            <p>
                                Veel van de onderdelen in de bieb beginnen met een <code> section </code> en kunnen dus
                                meteen in de <code> main </code> van een pagina worden geplakt.
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                            aria-expanded="false" aria-controls="collapseTwo21">
                            <h5 class="mb-0">
                                Een onderdeel toevoegen aan de bieb <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                        data-parent="#accordionEx1">
                        <div class="card-body">
                            <p> Om een onderdeel toe te voegen kan er allereerst een nieuw bericht worden aangemaakt. Vervolgens wordt de naam van het bericht de naam van het onderdeel en dient er een categorie aan het bericht te worden gegeven. Wanneer er geen juiste categorie bestaat, kan deze worden aangemaakt. Let wel op dat een nieuwe categorie ook altijd onder een hoofdcategorie valt. </p>
                            <p> In de editor kan vervolgens het template blok worden toegevoegd door een nieuw blok toe te voegen en te zoeken voor "Onderdeel Template".</p>
                            <img class="image-fluid" src="<?php echo get_template_directory_uri();?>/assets/images/add_template.png">
                            <p> Vervolgens moet dit template worden omgezet naar een normaal blok door op de 3 puntjes te klikken en te kiezen voor "Naar normaal blok veranderen". </p>
                            <img class="image-fluid" src="<?php echo get_template_directory_uri();?>/assets/images/verander_blok.png">
                            <p> Vervolgens kan dit blok worden aangepast om een onderdeel toe te voegen. De shortcode <code>[wrap-example isshortcode="" disc=""][/wrap-example]</code> maakt het voorbeeldblok op. Voor de parameter <code>disc</code> kan een beschrijving worden toegevoegd die rechts naast het voorbeeld komt te staan. Vervolgens kan de standaard tekst die staat tussen het openen en sluiten van de shortcode worden weggehaald. Hier kan of een afbeelding worden geplakt van het onderdeel, een "eigen HTML" blok kan worden ingevoegd om het element met HTML te laten zien. Er kan hier ook een shortcode worden uitgevoerd. Hiervoor moet de <code>isshortcode</code> parameter naar <code>true</code> worden gezet. </p>
                            <p> Nu kunnen de code snippets gemaakt worden. Standaard staan er 2 snippets in het template blok. Code snippets worden gemaakt met de shortcode <code>[create-snippet title=""][/create-snippet]</code>. Tussen het openenen en het sluiten van de shortcode kan een "code" blok worden ingevoegd waarin de code geplakt kan worden. De bieb maakt deze code dan zelf op en zorgt er voor dat de inhoud kan worden gekopieerd. De titel van de snippet kan worden aangepast met de parameter <code>title</code>. </p>
                            <p> Onderaan de pagina is er plek om een handleiding te schrijven voor het implementeren en gebruiken van het onderdeel. </p>
                            <p> Nadat het bericht is gepubliceerd, komt het automatisch bij de onderdelen van de opgegeven categorie te staan in de bieb. Als er een nieuwe categorie is gemaakt wordt deze ook automatisch aan het overzicht toegevoegd. </p>
                            <a href="https://demo.libelnet.eu/bieb/voorbeeldonderdeel/">Bekijk hier een voorbeeld onderdeel</a>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree31">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                            aria-expanded="false" aria-controls="collapseThree31">
                            <h5 class="mb-0">
                                De Testpagina gebruiken <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
                        data-parent="#accordionEx1">
                        <div class="card-body">
                            <p> Om nieuwe onderdelen te ontwikkelen kan de testpagina worden gebruikt. Dit is standaard een compleet lege pagina waarin makkelijk een onderdeel kan worden ontwikkeld. Voor deze pagina wordt het bestand <strong>template-testpagina.php</strong> gebruikt. De pagina hoort er, wanneer deze "leeg" is als volgt uit te zien:</p>
                            <script src="https://gist.github.com/RobinGalema/d78a8f890b7cbed88b87c9b30dedf8a5.js"></script>
                            <p> In de <code> main </code> kan het onderdeel worden gebouwd. Wanneer er een header of footer wordt gebouwd kunnen deze gewoon met hun eigen tags worden gemaakt buiten de main aangezien er geen standaard header en footer wordt ingeladen. De SCSS voor deze pagina kan worden geschreven in <strong>test_page.scss</strong> in het mapje <i>assets/scss-includes/</i>. Alles wat vervolgens wordt gebouwd kan hierin worden gestyled onder een nieuw kopje zal de zien zijn op de testpagina. Voor de overzichtenlijkheid van de bieb en om conflicten in de scss te voorkomen is het handig om het buitenste element, bijvoorbeeld de <code>header</code> , <code>section</code> of <code>div</code> een uniek ID te geven en vervolgens in de SCSS deze selector als eerste te gebruiken en hier vervolgens het hele onderdeel onder te nesten.</p>
                            <p> Natuurlijk kan er ook gebruik worden gemaakt van functions.php om shortcodes te schrijven en deze op de testpagina te gebruiken. Wanneer het onderdeel is afgerond kan deze worden toegevoegd in de bieb en kan de testpagina worden leeggemaakt. </p>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingFour41">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFour41"
                            aria-expanded="false" aria-controls="collapseFour41">
                            <h5 class="mb-0">
                                SCSS Gebruik <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseFour41" class="collapse" role="tabpanel" aria-labelledby="headingFour41"
                        data-parent="#accordionEx1">
                        <div class="card-body">
                            <p> Voor de bieb wordt uiteraard SCSS gebruikt. Het bestand <strong>main.scss</strong> wordt gebruikt voor alle scss die geldt voor de bieb zelf, los van de onderdelen. <strong>variables.scss</strong> wordt gebruikt om variabelen voor alle scss bestanden in te stellen. Deze variabelen komen qua naamgeving overeen met die uit het template thema. Verder wordt <strong>components.scss</strong> gebruikt voor de opmaak van alle losse onderdelen. Wanneer er een onderdeel wordt toegevoegd, wordt de scss aan dit bestand toegevoegd. Tot slot wordt <strong>test_page.php</strong> gebruikt voor de opmaak van de onderdelen in ontwikkeling op de testpagina. Het is de bedoeling dat de scss van dit bestand naar <strong>components.scss</strong> wordt verplaatst wanneer het onderdeel af is en in de bieb staat.</p>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->


            </div>
            <!-- Accordion wrapper -->

            <h4 class="mt-5 mb-3 ml-2"> <strong>Template Thema</strong> </h4>
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo1">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                            aria-expanded="false" aria-controls="collapseTwo1">
                            <h5 class="mb-0">
                                Installatie & Gebruik Thema <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                        data-parent="#accordionEx1">
                        <div class="card-body">
                            <p>
                                Het template thema kan bovenaan deze pagina worden gedownload. Voor bijna elke situatie is het aangeraden om met de "plain" versie van het thema te werken. De normale versie in een voorbeelduitwerking van het thema met onderdelen uit de bieb.
                            </p>
                            <h5> <strong>Installatie en WP-SCSS installatie</strong> </h5>
                            <p>
                                De Plain versie van het thema kan net als elk ander WordPress thema worden geïstalleerd en geactiveerd in de backoffice. Aangezien dit thema gebruik maakt van SCSS moet <a href="https://wordpress.org/plugins/wp-scss/">de WP-SCSS plugin</a> worden geïnstalleerd. Wanneer deze plugin geïstalleerd is kan deze als volgt worden ingesteld:
                            </p>
                            <img class="image-fluid" src="<?php echo get_template_directory_uri();?>/assets/images/scss.jpg">
                            <p>
                                Vervolgens kan er in het <strong>assets</strong> mapje van het thema een mapje in <strong>main.scss</strong> worden gewerkt. Om de plugin goed te laten werrken moet er tot slot gekeken worden of er een cache map is aangemaakt. Ga hiervoor naar de volgende map <code>wp-content/plugins/wp-scss</code> en kijk of er in deze map een mapje genaamd <strong>cache</strong> staat. Is dit niet het geval, maak dan het mapje <strong>cache</strong> aan.
                            </p>
                            <img class="image-fluid" src="<?php echo get_template_directory_uri();?>/assets/images/cache.jpg">
                            <p>
                                Vervolgens kan het template thema net als elk ander thema worden gebruikt en kunnen onderdelen uit de bieb gekopieerd worden om de site te vullen met content. Let er wel op dat voor het schrijven van HTML de standaard lay-out wordt gebruikt die bij het kopje <strong>Standaard Lay-Out</strong> op deze pagina staat beschreven. De onderdelen in de bieb zijn ook volgens deze lay-out gebouwd en passen zo dan ook het beste in het thema.
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo22"
                            aria-expanded="false" aria-controls="collapseTwo22">
                            <h5 class="mb-0">
                                Indeling & gebruik SCSS <i class="fas fa-plus rotate-icon"></i>
                            </h5>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo22" class="collapse" role="tabpanel" aria-labelledby="headingTwo22"
                        data-parent="#accordionEx2">
                        <div class="card-body">
                            <p>De SCSS voor het thema is opgedeeld in een aantal bestanden. Het hoofdbestand, waar de meeste custom scss in geschreven kan worden staat in het mapje <code>assets/scss/</code> en heet <strong>main.scss</strong>. 
                            </p>
                            <p>
                            Daarnaast wordt het bestand <strong>variables.scss</strong> in het mapje <code>assets/scss-includes/</code> gebruikt om de diverse variabelen vast te stellen. Wanneer variabelen worden aangepast of aangemaakt kan dat dus in dit bestand. Let op: het bestand variables.scss wordt pas opgeslagen en gecompiled door de plugin wanneer main.scss ook wordt opgeslagen.</p>
                            <p>
                                Het thema maakt gebruik van variabelen voor kleuren, fonts en voor transitions. Deze kunnen in <strong>variables.scss</strong> worden aangepast. De onderdelen die uit de bieb komen zullen grotendeels ook gebruik maken met van variabelen met dezelfde naamgeving. Het is dus aan te raden om de naamgeving van de variabelen niet aan te passen voor de beste samenwerking met bieb onderdelen. Toevoegen van variabelen kan altijd, deze moeten dan uiteraard nog wel bij diverse onderdelen worden toegepast.
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->
        </div>
    </section>

</main>






<?php get_footer();?>