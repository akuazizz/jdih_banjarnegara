<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<!-- Accessibility Code for "jdih.jatengprov.go.id" --> <script> window.interdeal = { "sitekey": "f41b7d7172f7f0fa576d073d542cfddb", "Position": "Left", "Menulang": "EN", "domains": { "js": "https://cdn.equalweb.com/", "acc": "https://access.equalweb.com/" }, "btnStyle": { "vPosition": [ "80%", null ], "scale": [ "0.8", "0.8" ], "color": { "main": "#1876c9", "second": "" }, "icon": { "type": 7, "shape": "circle", "outline": false } } }; (function(doc, head, body){ var coreCall = doc.createElement('script'); coreCall.src = interdeal.domains.js + 'core/4.4.2/accessibility.js'; coreCall.defer = true; coreCall.integrity = 'sha512-A9+ASEqwwTHkr8277jm4B3aoLL+QbUDSfgKqA6M7tWbu/Vlde4BsHZuFx8YFnSPdbVa6RJsb8xQ4+apAk2lkww=='; coreCall.crossOrigin = 'anonymous'; coreCall.setAttribute('data-cfasync', true ); body? body.appendChild(coreCall) : head.appendChild(coreCall); })(document, document.head, document.body); </script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZESCQWZSSR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZESCQWZSSR');
</script>
    
<script src="https://cdn.ayroui.com/1.0/js/tiny-slider.js"></script>

<script>
    

    // $(document).ready(function() {
    //     $(window).on("scroll", function(){
    //         if($(window).scrollTop() > 0){
    //             $("#header").css("background", "var(--semi-transparent)");
    //         }
    //         else if($(window).scrollTop() == 0){
    //             $("#header").css("background-color", "var(--transparent)");
    //         }
    //     })
    // });

    // //===== close navbar-collapse when a  clicked
    // let navbarTogglerNine = document.querySelector(
    //     ".navbar-nine .navbar-toggler"
    // );
    // navbarTogglerNine.addEventListener("click", function () {
    //     navbarTogglerNine.classList.toggle("active");
    // });

    // ==== left sidebar toggle
    let sidebarLeft = document.querySelector(".sidebar-left");
    let overlayLeft = document.querySelector(".overlay-left");
    let sidebarClose = document.querySelector(".sidebar-close .close");

    if (overlayLeft) {
        overlayLeft.addEventListener("click", function () {
            if (sidebarLeft) sidebarLeft.classList.toggle("open");
            overlayLeft.classList.toggle("open");
        });
    }
    if (sidebarClose) {
        sidebarClose.addEventListener("click", function () {
            if (sidebarLeft) sidebarLeft.classList.remove("open");
            if (overlayLeft) overlayLeft.classList.remove("open");
        });
    }

    // ===== navbar nine sideMenu
    let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");

    if (sideMenuLeftNine) {
        sideMenuLeftNine.addEventListener("click", function () {
            if (sidebarLeft) sidebarLeft.classList.add("open");
            if (overlayLeft) overlayLeft.classList.add("open");
        });
    }

    // Auto-close navbar collapse functionality
    $(document).ready(function() {
        // Listen to Bootstrap collapse events to handle toggler animation
        $('#navbarOne').on('show.bs.collapse', function() {
            $('.navbar-toggler').addClass('active');
        });

        $('#navbarOne').on('hide.bs.collapse', function() {
            $('.navbar-toggler').removeClass('active');
        });

        // Auto-close navbar when clicking on menu links in mobile view
        if (window.innerWidth < 992) {
            $('.navbar-nav .nav-item > a').on('click', function() {
                // Only close if it's a direct link (not a dropdown toggle with data-bs-toggle)
                if (!$(this).attr('data-bs-toggle')) {
                    $('.navbar-collapse').collapse('hide');
                }
            });

            // Also close when clicking on sub-menu links
            $('.navbar-nav .sub-menu a').on('click', function() {
                $('.navbar-collapse').collapse('hide');
            });
        }

        // Handle window resize - reset navbar state
        $(window).on('resize', function() {
            if (window.innerWidth >= 992) {
                if ($('.navbar-collapse').hasClass('show')) {
                    $('.navbar-collapse').collapse('hide');
                }
            }
        });

        // Close navbar when clicking outside
        $(document).on('click', function(e) {
            if (window.innerWidth < 992) {
                if (!$(e.target).closest('.navbar-area').length &&
                    $('.navbar-collapse').hasClass('show')) {
                    $('.navbar-collapse').collapse('hide');
                }
            }
        });
    });


</script>
