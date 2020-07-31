$( document ).ready(function() {
    $('.nav-item a[href^="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').parent().addClass('active');

    let refs = $('sup.ref');
    console.log(refs);

    let resources_list = $('#resource-items')



    refs.each(id => {
        let ref = refs[id]

        resources_list.append($('<div> <span class="resources-index">('+(id+1)+')</span> <a target="_blank" href="'+$(ref).attr('src')+'" class="link"> '+$(ref).attr('src')+' </a></div>'))
        $(ref).text('('+(id+1)+')')
        console.log(ref)
    });

});
