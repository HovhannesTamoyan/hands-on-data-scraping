$( document ).ready(function() {
    $('.nav-item a[href^="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').parent().addClass('active');



    let refs = $('sup.ref');
    let resources_list = $('#resource-items')

    refs.each(id => {
        let ref = refs[id]

        resources_list.append($('<div> <span class="resources-index">('+(id+1)+')</span> <a target="_blank" href="'+$(ref).attr('src')+'" class="link"> '+$(ref).attr('src')+' </a></div>'))
        $(ref).text('('+(id+1)+')')
    });



    texts = $(".txt")

    texts.each(text_id => {
        elem = $(texts[text_id])
        let matches = elem.text().match(/“(.*?)”/g);
        if (matches) {

            matches.forEach((value, i) => {
                let replicant = "<span class='quote'>"+value+"</span>"

                console.log(replicant)
                elem.html(elem.html().replace(value, replicant))
                console.log(value)
            })
            // for (let key in matches){
            //     console.log(key)
            // }

            // matches.each(match_id => {
            //     console.log(match_id)
            // })
            // matches.each(match_id => {
            //     console.log(matches[match_id])
            // })
            // console.log(match)
        }
    })
});
