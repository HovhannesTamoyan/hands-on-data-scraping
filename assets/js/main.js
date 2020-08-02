$( document ).ready(function() {
    $('a.nav-item[href^="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').addClass('active');



    let refs = $('sup.ref');
    let resources_list = $('#resource-items')

    refs.each(id => {
        let ref = refs[id]

        resources_list.append($('<div> <span class="resources-index">('+(id+1)+')</span> <a target="_blank" href="'+$(ref).attr('src')+'" class="link"> '+$(ref).attr('src')+' </a></div>'))
        $(ref).text('('+(id+1)+')')
    });



    texts = $(".txt")

    texts.each(text_id => {
        txt = $(texts[text_id])

        let re = /“(.*?)”/


        var txt_modifs = new Array;


        function find_matches(corpus) {
            if ((match = re.exec(corpus)) != null && corpus.length != 0) {

                let start =  match.index
                let end =  match.index + match[0].length
    
    
                let replicant = "<span class='quote'>"+match[0]+"</span>"
    
                let firstPart = corpus.substr(0, start);
                let lastPart = corpus.substr(end, corpus.length);


                txt_modifs.push(firstPart + replicant)

                find_matches(lastPart)
            }else{
                txt_modifs.push(corpus)
            }
        }

        find_matches(txt.html())


        txt.html(txt_modifs.join(''))

    })

});

function navToggle() {
    var x = document.getElementById("nav-container");
    if (x.className === "nav-container") {
    x.className += " responsive";
    } else {
    x.className = "nav-container";
    }
}