
$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTab a[href="#profile"]').tab('show') // Select tab by name
$('#myTab li:first-child a').tab('show') // Select first tab
$('#myTab li:last-child a').tab('show') // Select last tab
$('#myTab li:nth-child(3) a').tab('show') // Select third tab


//footer 
    jQuery(document).ready(function($) {

        /**
         * Set footer always on the bottom of the page
         */
        function footerAlwayInBottom(footerSelector) {
            var docHeight = $(window).height();
            var footerTop = footerSelector.position().top + footerSelector.height();
            if (footerTop < docHeight) {
                footerSelector.css("margin-top", (docHeight - footerTop) + "px");
            }
        }
        // Apply when page is loading 
        footerAlwayInBottom($("#footer"));
        // Apply when page is resizing
        $(window).resize(function() {
            footerAlwayInBottom($("#footer"));
        });
    });
