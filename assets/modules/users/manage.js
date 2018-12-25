import ScriptLoader from './../../helpers/ScriptLoader';

const manage = ScriptLoader;

manage.element = ".backOffice .user-manage";

manage.script = () => {

    let v = new Vue({

        el: manage.element,

        delimiters: ['${', '}'],
        
        data: {
            id: null,
            user: null,
            users: null,
        },

        methods: {
            
            // Récuperation de tous les utilisateurs
            getUsers: () => {

            },

            // Rechercher d'une liste d'utilisateur
            searhUser: () => {
                
            },

            // Récupération d'un utilisateur 
            getUser: (userId) => {
                const req = new XMLHttpRequest();
                req.open('GET', manage.location+'/user/manage/'+userId, false); 
                req.send(null);
                v.user = req.responseText;
                console.log(v.user);
             } 
           
        }

    });

}


export default manage; 