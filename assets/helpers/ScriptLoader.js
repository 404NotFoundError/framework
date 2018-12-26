
class ScriptLoader 
{

    constructor(element) {

        this.host     = window.location.protocol+'//'+window.location.host;
        this.location = window.location.href;
        this.element  = element;

    }
    
    load(script) {
        
        let element = document.querySelector(this.element);
        
        if (element !== null) {
            script()
        }
       
    }
    
}

export default ScriptLoader;