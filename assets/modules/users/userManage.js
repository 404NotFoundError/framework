const loaction = window.location.protocol+'//'+window.location.host;

const userManage = () => {

    // Liste des utilisateurs
    getUserList();
    

}

// On récupère la liste de sutilisateurs
const getUserList = () => {
    
    fetch(loaction+'/api/users/1234567890')
    // Renvoie des données brut
    .then((response) => response.json())
    .then((list) => {
       console.log(list);
    })
    .catch(fetchError => {
      console.log(fetchError);
    });

}

// On rechercher un utilisateur
const searchUserByName = () => {
    
    fetch(loaction+'/api/users/search/admin/1234567890')
    // Renvoie des données brut
    .then(rawContent => {
      // Retour de donnée exploitable
       return rawContent.json();
    })
    .then( textContent => {
        console.log(textContent);
    })
    .catch(fetchError => {
      console.log(fetchError);
    });

}


export default userManage;