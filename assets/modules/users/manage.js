import ScriptLoader from './../../helpers/ScriptLoader';
import { log } from 'util';

const manage = ScriptLoader;

manage.element = ".backOffice .user-manage";

// Barre de recherche
const searchInput = document.forms['search-form']['search'];
// Contenzur d'utilisateur 
const list = document.querySelector('.users-list');
// Liste des utilisateurs

// Script
manage.script = () => {

    search();
    
    new Vue({
        el: manage.element,
        delimiters: ['${', '}'],
        data: {
            test: null,
            user: null
        },

        methods: {
            // Récupération d'un utilisateur 
            getUser: (userId) => {
               const req = new XMLHttpRequest();
               req.open('GET', manage.location+'/user/manage/'+userId, false); 
               req.send(null);
               console.log(req.responseText);
            },
           
        }
       

    });

}


// Fais à l'arrache 
const search = () => {
    searchInput.addEventListener('keyup', function () {
        let usersElement = document.querySelectorAll('.users-list > div');
        for (let i = 0; i < usersElement.length; i++) { list.removeChild(usersElement[i]);}
        searchUsers(searchInput.value);
    });
}

// Réccupération de la liste des utilisateurs
const searchUsers = (username) => {
    fetch(manage.loaction+'/user/search/'+username)
    .then((response) => response.json())
    .then((users) => {
        for (let i = 0; i < users.length; i++) {
            const user = users[i];
            // user 
            let userDiv = document.createElement('div');
            userDiv.className = "user";
            list.appendChild(userDiv);
            // picture
            let picture = document.createElement('div');
            picture.className = "pic";
            userDiv.appendChild(picture);
            // img
            let img = document.createElement('img');
            picture.appendChild(img);
            // data 
            let data = document.createElement('div');
            data.className = "data";
            userDiv.appendChild(data);
            // lastname 
            let lastname = document.createElement('div');
            lastname.className = "lastname";
            lastname.innerHTML = user.lastname;
            data.appendChild(lastname);
            // firstname 
            let firstname = document.createElement('div');
            firstname.className = "firstname";
            firstname.innerHTML = user.firstname;
            data.appendChild(firstname);
            // email 
            let email = document.createElement('div');
            email.className = "email";
            email.innerHTML = user.email;
            data.appendChild(email);
        }
    });
}

export default manage; 