function like_user(results){
    const div = document.createElement('div');
    for(const result of results){

        const user = result.username; 
    }
}


function createComment(results, divselected, res){
    console.log(arguments);
    if(arguments.length === 2){
        res = null;
        for(const result of results){
            const creatediv = document.createElement('div');
            creatediv.classList.add('div_for_comment');
            const div_profile= document.createElement('div');
            div_profile.classList.add('profile');
            const strong = document.createElement('strong');
            const br = document.createElement('br');
            const em = document.createElement('em');
            strong.textContent = '@'+result.username;
            em.textContent = result.nome+' '+result.cognome;

            div_profile.appendChild(strong);           
            div_profile.appendChild(br);
            div_profile.appendChild(em);
            creatediv.appendChild(div_profile);

            const divtext = document.createElement('div');
            divtext.classList.add('text_comment');
            const content = document.createElement('p');
            content.textContent = result.testo;
            divtext.appendChild(content);
            creatediv.appendChild(divtext);
            divselected.appendChild(creatediv);
            divselected.classList.remove('hidden');
            divselected.dataset.verificaId = 1;
        }
    }
    else{
            const creatediv = document.createElement('div');
            creatediv.classList.add('div_for_comment');
            const div_profile= document.createElement('div');
            div_profile.classList.add('profile');
            const strong = document.createElement('strong');
            const br = document.createElement('br');
            const em = document.createElement('em');
            strong.textContent = '@'+res.username;
            em.textContent = res.nome+' '+res.cognome;

            div_profile.appendChild(strong);           
            div_profile.appendChild(br);
            div_profile.appendChild(em);
            creatediv.appendChild(div_profile);

            const divtext = document.createElement('div');
            divtext.classList.add('text_comment');
            const content = document.createElement('p');
            content.textContent = res.testo;
            divtext.appendChild(content);
            creatediv.appendChild(divtext);
            divselected.appendChild(creatediv);
            divselected.classList.remove('hidden');
            divselected.dataset.verificaId = 1;
            
            const spans = document.querySelectorAll('.ncomments span');
            for(const span of spans){
                if(span.parentNode.parentNode.firstChild.dataset.postId == res.idpost){
                    span.textContent = res['number_comments'];
                    break;
                }
            }


    }
}


function onJsonComments(json){ 
    const results = json;
    console.log(results);
    const idpost = json[0].idpost;
    const div_comment = document.querySelectorAll('.last_comments');
    
    let divselected = undefined;
    if(results[0].correct === true){ 
        for( const div of div_comment){
            if(div.dataset.commentsId == idpost){
                divselected = div;
                break;       
            }
        }
        
        createComment(results, divselected);
        const input = document.querySelector('.form_comments input');
        input.textContent = '';


    }
    else{
        console.log('non ci sono vecchi commenti');
    }
    commenti_verificati = 1;
}

function onJsonPreferiti(json){
    const results = json;
    console.log(results);
    const utente = results[0].utente_loggato;
    const posts = document.querySelectorAll('div.pref');
    let pref = false;
    let array_post= [];
    let i = 0;
        for(const result of results){
            console.log(result);
            console.log(result.iduser);
            console.log(utente);
            if(result.iduser === utente){
                console.log(utente);
                for(const post of posts){
                    console.log(post);
                    const img = post.firstChild;
                    if(post.dataset.postId == result.idpost){
                        pref = true;
                        img.src = './images/image_starPref.png';
                        img.addEventListener('click', deletePrefPost);
                        array_post[i] = post.dataset.postId;
                   
                        i = i + 1;
                    }
                   
                }
            }
        }
        if(pref === false){
            for(const post of posts){
                const img = post.firstChild;
                img.addEventListener('click', addPrefPost);
                
            }
        }
        for(const post of posts){
            console.log(array_post);
            if(array_post.includes(post.dataset.postId) == false){
                const img = post.firstChild;
                img.addEventListener('click', addPrefPost);
            }
        }
    
}

function onJsonLikes(json){
    const results = json;
    console.log(results);
    const utente = results[0].utente_loggato;
    const posts = document.querySelectorAll('div.nlikes');
    let like = false;
    let array_post= [];
    let i = 0;
    for(const result of results){
        console.log(result);
        if(result.iduser === utente){
            console.log(utente);
            for(const post of posts){
                console.log(post);
                const img = post.firstChild;
                console.log('post ciclo'+post.dataset.postId);
                console.log('post che ha il like nel db'+result.idpost);
                if(post.dataset.postId == result.idpost){
                    console.log('sto per cambiare immagine');
                    like = true;
                    img.src = './images/image_liked.png';
                    img.addEventListener('click', unlikePost);
                    array_post[i] = post.dataset.postId;
                   
                    i = i + 1;

                }
                
                
            }
        }
    }
    if(like === false){
        for(const post of posts){
            const img = post.firstChild;
            img.addEventListener('click', likePost);
            
        }
        return;
    }
    for(const post of posts){
        console.log(array_post);
        if(array_post.includes(post.dataset.postId) == false){
            const img = post.firstChild;
            img.addEventListener('click', likePost);
        }
    }

}

function verifica_commenti(idpost){

   fetch(BASE_URL + "home/recupera_commenti/"+encodeURIComponent(idpost)).then(onSuccess, onError).then(onJsonComments);

}


function verifica_like(){

    
    fetch(BASE_URL + "home/recupera_like").then(onSuccess, onError).then(onJsonLikes);
    
}


function verifica_preferiti(){

    fetch(BASE_URL + "home/recupera_preferiti").then(onSuccess, onError).then(onJsonPreferiti);
}

function onJson(json){
    console.log('Json ricevuto');
    console.log(json);
    const results = json;
    console.log('quiiiiiiiii');
    console.log(results);
    console.log(results[0].correct);
    if(results[0].correct !== false){
        let b = 0;
        let c = 0;
        for(const result of results){
            console.log(result);
            const section = document.querySelector('#feed');
            const div1 = document.createElement('div');
            const username = document.createElement('strong');
            const breakLine = document.createElement('br');
            const breakLine2 = document.createElement('br');
            const name_surname = document.createElement('em');
            const ricerca = document.createElement('em');
            const div2 = document.createElement('div');
            const descrizione = document.createElement('p');
            const buttonMostra = document.createElement('button');
            const buttonNascondi = document.createElement('button');
            const consigli = document.createElement('p');
            const image = document.createElement('img');

            const divinterazioni = document.createElement('div');
            divinterazioni.classList.add('interazioni');

            const div_likes = document.createElement('div');
            const img_likes = document.createElement('img');
            const nlikes = document.createElement('span');
            div_likes.classList.add('nlikes');
            img_likes.src = "./images/image_like.png";
            
            console.log(result.number_likes);
            nlikes.textContent = result.number_likes;
            div_likes.appendChild(img_likes);
            div_likes.appendChild(nlikes);

            const div_comments = document.createElement('div');
            const img_comments = document.createElement('img');
            const ncomments = document.createElement('span');
            div_comments.classList.add('ncomments');
            img_comments.src = "./images/image_comment.png";
            console.log(result.number_comments);
            ncomments.textContent = result.number_comments;
            div_comments.appendChild(img_comments);
            div_comments.appendChild(ncomments);

            const div_preferiti = document.createElement('div');
            const img_preferiti= document.createElement('img');
            const preferiti = document.createElement('span');
            div_preferiti.classList.add('pref');
            img_preferiti.src = "./images/image_starNormal.png";
            preferiti.textContent = 'Preferiti';
            div_preferiti.appendChild(img_preferiti);
            div_preferiti.appendChild(preferiti);
            

            divinterazioni.appendChild(div_likes);
            divinterazioni.appendChild(div_comments);

            divinterazioni.appendChild(div_preferiti);


            div2.appendChild(descrizione);
            div2.appendChild(buttonMostra);
            div2.appendChild(buttonNascondi);
            div2.appendChild(consigli);
            div2.appendChild(image);

            div1.appendChild(username);
            div1.appendChild(breakLine);
            div1.appendChild(name_surname);
            div1.appendChild(breakLine2);
            div1.appendChild(ricerca);
            div1.appendChild(div2);

            section.appendChild(div1);

            image.src = result.image;
            console.log(result.image);
            username.textContent = '@'+result.username;
            name_surname.textContent = result.nome +' '+ result.cognome;
            ricerca.textContent = result.ricerca;
            descrizione.textContent = result.descrizione;
            consigli.textContent = result.tips;
            consigli.dataset.id_tip = c;
            consigli.classList.add('hidden');
            consigli.classList.add('consigli');
            buttonMostra.textContent = 'Mostra consigli';
            buttonNascondi.textContent = 'Nascondi consigli';
            buttonMostra.dataset.id = b;
            buttonNascondi.dataset.id = b;
            buttonMostra.addEventListener('click', button_tipsMostra);
            buttonNascondi.addEventListener('click', button_tipsNascondi);
            div2.classList.add('contenuto_div');
            div1.classList.add('div_feed');
            div1.appendChild(divinterazioni);
            div_likes.dataset.postId = result.idpost;
            div_preferiti.dataset.postId = result.idpost;


            const blocco_commenti = document.createElement('div');
            blocco_commenti.classList.add('comments');
            blocco_commenti.classList.add('hidden');
            blocco_commenti.dataset.postId = result.idpost;
            const commenti_passati = document.createElement('div');
            commenti_passati.classList.add('last_comments');
            commenti_passati.dataset.verificaId = 0;
            commenti_passati.dataset.commentsId = result.idpost;
            commenti_passati.classList.add('hidden');
            const div_toform = document.createElement('div');
            const form_comment = document.createElement('form');
            form_comment.method = 'post';
            form_comment.onkeydown = logKey;
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'content';
            input.maxLength ='250';
            input.placeholder = 'Scrivi qui';
            input.classList.add('input_comment');
            const submit = document.createElement('input');
            submit.type = 'button';
            submit.value = 'Pubblica';
            submit.classList.add('submit_comment');
            submit.dataset.postId = result.idpost;

            img_comments.addEventListener('click', addComment);
            form_comment.appendChild(input);
            form_comment.appendChild(submit);
            form_comment.classList.add('form_comments');
            div_toform.appendChild(form_comment);
            blocco_commenti.appendChild(commenti_passati);
            blocco_commenti.appendChild(div_toform);
            div1.appendChild(blocco_commenti);
         

            submit.addEventListener('click', Commsubmit);
            b++;    
            c++;
        }
    }
    else{
        const section = document.querySelector('#feed');
        const div1 = document.createElement('div');
        const text = document.createElement('strong');
        div1.classList.add('div_feed');
        text.textContent = 'Nessun post da visualizzare';
        div1.appendChild(text);
        section.appendChild(div1);
        return;
    }
    verifica_like();
    verifica_preferiti();
}

function logKey(event) {
    if(event.code == 'Enter'){
        event.preventDefault();
    }
}
function onSuccess(response) {
    console.log('Risposta ricevuta');
    if (!response.ok) {
        return null;
    }
    return response.json();
 }

function onError(error){
    console.log('Errore: ' + error)
}

function onJsonAddComment(json){
    const alldiv = document.querySelectorAll('div.ncomments');
    const result = json;
    console.log(result);
    if(result.error === false){
        console.log('commento caricato');
        for(const div of alldiv){
            if(div.dataset.postId === result.idpost){
                const span = div.lastChild;
                span.textContent = result.number_likes;
                break;
            }
        }
        const div_comment = document.querySelectorAll('.last_comments');
        for( const div of div_comment){
            if(div.dataset.commentsId === result.idpost){
                divselected = div;
                break;       
            }
        }
        createComment(null, divselected,result);
    }
}

function Commsubmit(event){
    
    const input = event.currentTarget;
    console.log(input.parentNode.firstChild);
    
    const form_data = new FormData();  
    form_data.append('content', input.parentNode.firstChild.value)  ;
    form_data.append('idpost', input.dataset.postId);
    form_data.append('_token', csrf_token);
    fetch(BASE_URL + "home/inserisci_commento", {method: 'post', body: form_data}).then(onSuccess, onError).then(onJsonAddComment);
    input.parentNode.firstChild.value = '';
    
}


function addComment(event){
    const target = event.currentTarget;
    const elem = target.parentNode.parentNode.firstChild;
    const idpost = elem.dataset.postId;
    const div_comment = document.querySelectorAll('.last_comments');
    for( const div of div_comment){
        if(div.dataset.commentsId === idpost){
            divselected = div;
            break;       
        }
    }
    console.log(divselected.dataset.verificaId);
    if(divselected.dataset.verificaId == 0){
        verifica_commenti(idpost);
    }
    const comment_div = document.querySelectorAll('.comments');
    for(const div of comment_div){
        if(div.dataset.postId === idpost){
            div.classList.remove('hidden');
            break;
        }
    }
    target.removeEventListener('click', addComment);
    target.addEventListener('click', closeComments);

}

function closeComments(event){
    const target = event.currentTarget;
    const elem = target.parentNode.parentNode.firstChild;
    const idpost = elem.dataset.postId;
    const comment_div = document.querySelectorAll('.comments');
    for(const div of comment_div){
        if(div.dataset.postId === idpost){
            div.classList.add('hidden');
            break;
        }
    }
    target.removeEventListener('click', closeComments);
    target.addEventListener('click', addComment);
}

function onJsonInPref(json){
    const alldiv = document.querySelectorAll('div.pref');
    const result = json;
    if(result.error === false){
        for(const div of alldiv){
            if(div.dataset.postId === result.idpost){
                const img = div.firstChild;
                img.src = './images/image_starPref.png';
                break;
            }
        }
    }
}

function onJsonInLike(json){
    const alldiv = document.querySelectorAll('div.nlikes');
    const result = json;
    if(result.error === false){
        for(const div of alldiv){
            if(div.dataset.postId === result.idpost){
                input = div.firstChild;
                console.log(result.number_likes);
                input.src = './images/image_liked.png';
                input.addEventListener('click', unlikePost);
                const span = div.lastChild;
                span.textContent = result.number_likes;
                break;
            }
        }
    }
    
}

function addPrefPost(event){
    const input = event.currentTarget;
    input.removeEventListener('click', addPrefPost);
    
    
    const form_data = new FormData();
    form_data.append('_token', csrf_token);
    form_data.append('idpost', input.parentNode.dataset.postId);
    fetch(BASE_URL + "home/inserisci_pref", {method: 'post', body: form_data}).then(onSuccess, onError).then(onJsonInPref);
    
    input.addEventListener('click', deletePrefPost);
}

function likePost(event){
    const input = event.currentTarget;
    console.log(input);
    input.removeEventListener('click', likePost);
    
    
    const form_data = new FormData();
    
    form_data.append('idpost', input.parentNode.dataset.postId);
    form_data.append('_token', csrf_token);
    fetch( BASE_URL + "home/inserisci_like", {method: 'post', body: form_data}).then(onSuccess, onError).then(onJsonInLike);
    
}


function onJsonDeletePref(json){
    const alldiv = document.querySelectorAll('div.pref');
    const result = json;
    if(result.error === false){
        for(const div of alldiv){
            if(div.dataset.postId === result.idpost){
                const img = div.firstChild;
                img.src = './images/image_starNormal.png';
                img.addEventListener('click', addPrefPost);
                break;
            }
        }
    }
}

function onJsonDeleteLike(json){
    const alldiv = document.querySelectorAll('div.nlikes');
    const result = json;
    console.log(result);
    if(result.error == false){
        for(const div of alldiv){
            if(div.dataset.postId === result.idpost){
                console.log(result.number_likes);
                const span = div.lastChild;
                span.textContent = result.number_likes;
                const input = div.firstChild;
                input.src = './images/image_like.png';
                input.addEventListener('click', likePost);
                break;
            }
        }
    }
}

function deletePrefPost(event){
    const input = event.currentTarget;
    input.removeEventListener('click', deletePrefPost);
    const form_data = new FormData();
    form_data.append('_token', csrf_token);
    form_data.append('idpost', input.parentNode.dataset.postId);
    fetch(BASE_URL + "home/elimina_pref", {method: 'post', body: form_data}).then(onSuccess, onError).then(onJsonDeletePref);
    
    
}

function unlikePost(event){
    console.log(event);
    const input = event.currentTarget;
    input.removeEventListener('click', unlikePost);
    const form_data = new FormData();
    form_data.append('_token', csrf_token);
    form_data.append('idpost', input.parentNode.dataset.postId);
    fetch(BASE_URL + "home/elimina_like", {method: 'post', body: form_data}).then(onSuccess, onError).then(onJsonDeleteLike);
    
    
}

function button_tipsMostra(event){
    const button = event.currentTarget;
    const consigli = document.querySelectorAll('#feed p.consigli');
    for(const consiglio of consigli){
        if(consiglio.dataset.id_tip == button.dataset.id){
            if(consiglio.classList.contains('hidden')){
                consiglio.classList.remove('hidden');
            }
        }
    }

}

function button_tipsNascondi(event){
    const button = event.currentTarget;
    const consigli = document.querySelectorAll('#feed p.consigli');
    for(const consiglio of consigli){
        if(consiglio.dataset.id_tip == button.dataset.id){
            if(!consiglio.classList.contains('hidden')){
                consiglio.classList.add('hidden');
            }
        }
    }
}

function recuperaPosts(){

    fetch(BASE_URL+"home/recupera_posts").then(onSuccess, onError).then(onJson);
}




function onJsonProfile(json){
    console.log(json);
    const result = json.foto;
    const image = document.querySelector('#profile img');
    image.src = result;
}

function formListener(event){
    fetch('foto_profilo.php').then(onSuccess, onError).then(onJsonProfile);
}
var commenti_verificati = 0;


recuperaPosts();