console.log("Ein Hallo aus main.js");

const baseUrl = magicalData.siteURL;

let testBtn = document.getElementById('js-test-button');
let testContainer = document.getElementById('js-test-container');

function handleError (response) {
    if(!response.ok) {
        throw Error(`Da ging etwas schief: ${response.status} ${response.statusText}`);
    }
    return response.json();
}

if(testBtn) {
    testBtn.addEventListener('click', () => {
        console.log('button clicked');
        fetch(`${baseUrl}/wp-json/wp/v2/posts?categories=7`)
        .then(response => {
            if(!response.ok) {
                throw Error(`Da ging etwas schief: ${response.status} ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            createHtml(data);
        })
        .catch(error => {
            console.log(error);
        });
    });
}

function createHtml(postData) {
    if(!postData) return;
    let htmlString = "";
    postData.forEach(post => {
        htmlString = `${htmlString}<h2>${post.title.rendered}</h2>${post.content.rendered}`
    });
    testContainer.innerHTML = htmlString;
}

//Hinzufügen eines Beitrags in die Testkategorie (category=7)
let addBtn = document.getElementById('quick-add-button');

if(addBtn) {
    addBtn.addEventListener('click', () => {
        if (!magicalData.nonce) return false;
        const secretUserCode = magicalData.nonce;
        
        const authHeaders = new Headers({
            'Content-Type' : 'application/json',
            'X-WP-Nonce' : secretUserCode,
            'X-Stefan-Test' : 'Hallo, aus dem Header'
        });
        let data = {
            'title' : document.querySelector('#users-post [name="title"]').value,
            'content': document.querySelector('#users-post [name="content"]').value,
            'categories' : [7],
            'status' : 'publish'
        };

        console.log(data);
        let options = {
            method : 'post',
            headers: authHeaders,
            body: JSON.stringify(data)
        };

        fetch(`${baseUrl}/wp-json/wp/v2/posts`, options)
        .then(response => {
            handleError(response);
        })
        .then(data => {
            console.log('Hat geklappt:', data);
            document.querySelector('#users-post [name="title"]').value = "";
            document.querySelector('#users-post [name="content"]').value = "";
        })
        .catch(error => {
            console.log(error);
        });
    })
}