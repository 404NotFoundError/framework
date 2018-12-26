import ScriptLoader from './../../helpers/ScriptLoader';

let projectManage = new ScriptLoader(
    "body.backOffice article.projet-manage"
);

const script = () => {
    console.log('HOST: ' + projectManage.host);
    console.log('LOCATION: ' + projectManage.location);
    console.log('PROJECT MANAEG HERER');
}

projectManage.load(script);

export default projectManage; 