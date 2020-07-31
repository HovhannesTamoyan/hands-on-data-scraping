$( document ).ready(function() {
    console.log( "ready!" );



    $('.nav-item a[href^="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').parent().addClass('active');
    console.log(location.pathname.split("/")[location.pathname.split("/").length - 1]);
});

// $(function() {
// });