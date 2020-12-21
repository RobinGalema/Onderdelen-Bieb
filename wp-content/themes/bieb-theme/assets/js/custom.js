/* navigatie via hamburger openen */

/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}

/* Open when someone clicks on the span element */
function openNavHeader() {
    document.getElementById("myNavHeader").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNavHeader() {
    document.getElementById("myNavHeader").style.width = "0%";
}

jQuery(document).ready(function () {
    SlideOutMenu(); // <-- Setup eventlisteners for slide out menu
    StickyNav(); // <-- Apply evenlistener for adding sticky class to nav
    ToggleCollapseIcon(); // <-- Toggle for bootstrap collapse
});


// =================================================
//  COPYING OF CODE SNIPPETS
// =================================================
/**
 * Function that copies the content of a code snippet to the clipboard
 * @param {element} button The copy-77button of the code snippet that should be copied
 */
const CopySnippet = (button) => {
    console.log(button);
    let code = jQuery(button.closest('.code-container')).find('code'); // Get the code element
    let clip = jQuery(code).text(); // Convert to a readable string of code

    updateClipboard(clip); // copy the string to the clipboard
}

/**
 * Sets the clipboard to the given string
 * @param {string} newClip Content that will be copied to clipboard
 */
function updateClipboard(newClip) {
    navigator.clipboard.writeText(newClip).then(function () {
        /* clipboard successfully set */
    }, function () {
        /* clipboard write failed */
    });
}


// =================================================
//  JAVASCRIPT FROM LIBRARY PARTS FROM HERE
// =================================================


// ---> FAQ <----
/**
 * Function that expands and collapses faq content
 * @param {HTMLElement} element The element containing the heading of the accordeon 
 */
const toggleFaq = (element) => {
    // Get the element containing the answer
    let answerDiv = element.parentElement.querySelector("#answer");

    // Toggle classlist of the question element for animations
    if (element.getAttribute("data-active") == "false") {
        element.classList.add("active");
        element.setAttribute("data-active", "true");
    } else if (element.getAttribute("data-active") == "true") {
        element.classList.remove("active");
        element.setAttribute("data-active", "false");
    }

    // Toggle the visibility of the answer div with jquery
    jQuery(answerDiv).slideToggle(400, "swing");
}


// ---> SLIDE OUT MENU <----
/**
 * Function that sets up the onclick events to toggle the menu and dropdown items
 */
const SlideOutMenu = () => {
    jQuery("[data-trigger]").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id = jQuery(this).attr('data-trigger');
        jQuery(offcanvas_id).toggleClass("show");
        jQuery('body').toggleClass("offcanvas-active");
        jQuery(".screen-overlay").toggleClass("show");
    });

    jQuery(".btn-close, .screen-overlay").click(function (e) {
        jQuery(".screen-overlay").removeClass("show");
        jQuery(".offcanvas").removeClass("show");
        jQuery("body").removeClass("offcanvas-active");
    });

    jQuery(".menu-item-has-children").click(function (e) {
        let dropdown = jQuery(e.currentTarget).find(".sub-menu");
        jQuery(dropdown).slideToggle(300); // de tijd in ms die bepaald hoelang de animatie er over doet op een submenu uit te klappen
    })
}


const StickyNav = () => {
    document.addEventListener('scroll', function (e) {
        try {
            if (jQuery(window).scrollTop() >= 400 && !jQuery('#sticky-header')[0].classList.contains('active')) { // Add class to make the bar sticky
                jQuery('#sticky-header').addClass("active");
            } else if (jQuery(window).scrollTop() < 400 && jQuery('#sticky-header')[0].classList.contains('active')) { // Remove class to hide the navbar
                jQuery('#sticky-header').removeClass("active");
            }
        } catch {
            return;
        }
    });
}

/**
 * Function that toggles the font awesome icon of the mobile nav
 * @param {Element} element The button containing a font awesome icon
 */
const toggleNavIcon = (element) => {
    let icon = jQuery(element).find('.fas');

    jQuery(icon).toggleClass('fa-bars');
    jQuery(icon).toggleClass('fa-times');
}

/**
 * Function that toggles the .active class of an svg element
 * @param {Element} element The SVG element to toggle class of 
 */
const ToggleHamburgerSVG = (element) => {
    jQuery(element).toggleClass('active');
}


/**
 * Function that toggles the icon for the bootstrap collapse shortcode
 */
const ToggleCollapseIcon = () =>{
    let headers = jQuery(".card-header");
    headers = Array.from(headers);

    // Check if collapse exist on page
    if (headers.length == 0){return}; // <-- if no collapse exists, return out of the function
    
    headers.forEach(header => {
        let link = jQuery(header).find('a');
        
        link[0].addEventListener('click', function(e){
            if(link[0].getAttribute("aria-expanded") == "false"){
                jQuery(link).find('i').toggleClass('fa-plus');
                jQuery(link).find('i').toggleClass('fa-minus');
            }
            else if (link[0].getAttribute("aria-expanded") == "true"){
                jQuery(link).find('i').toggleClass('fa-plus');
                jQuery(link).find('i').toggleClass('fa-minus');
            }
        })
    });
}