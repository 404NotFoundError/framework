
// Chaque page sera représenter par un objet
let ScriptLoader = {

    // Permet d'avoir l'url courante
    loaction: window.location.protocol+'//'+window.location.host,
    // Le selecteur css du module 
    element: null,
    // La liste de tes variables
    var: {},

    // A ne jamais utiliser, c'est une fonction autonome du framework
    loader: () => {

        const element = document.querySelector(ScriptLoader.element);
        // On va réccuperer l'élément 
        if (element !== null) {
            ScriptLoader.script();
        }
        
    },

    // Cette fonction doit être redéfinir dans l'objet pour définit le code à excuter pour la page
    script: () => {},

}   

export default ScriptLoader;