var centrar_aside_under = function( widthscreen ){
    if ( widthscreen <= 800 ) {
        $("#under_construction").find("aside").removeClass("section_middle_right").addClass("section_middle_center");
    }
    else{
        $("#under_construction").find("aside").removeClass("section_middle_center").addClass("section_middle_right");
    }
}

$( document ).ready( function() {
    $( window ).resize( function( event ) {
        centrar_aside_under( $(this).width() );
    });
    centrar_aside_under( $( window ).width() );

    $(".textwidget").addClass('w_100 section_top_center');

    var other_post = $("#other_post").html();
    if (other_post != undefined) {
        $("#other_post").easyPaginate({
            paginateElement: 'article',
            elementsPerPage: 3,
            effect: 'climb'
        });
    }
});
