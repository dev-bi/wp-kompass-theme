console.log("Ein Hallo aus main.js");

let testBtn = document.getElementById('js-test-button');
let testContainer = document.getElementById('js-test-container');

if(testBtn) {
    testBtn.addEventListener('click', () => {
        console.log('button clicked');
        fetch('http://localhost/bi-kompass/wp_bi-kompass/wp-json/wp/v2/posts?categories=7')
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
        const secretUserCode = 123;
        const headers = new Headers({
            'Content-Type' : 'application/json',
            'X-WP-Nonce' : secretUserCode
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
            body: JSON.stringify(data)
        };

        fetch('http://localhost/bi-kompass/wp_bi-kompass/wp-json/wp/v2/posts', options)
        .then(response => response.json())
        .then(data => {
            console.log('Hat geklappt:', data);
        })
        .catch(error => {
            console.log(error);
        });
    })
}