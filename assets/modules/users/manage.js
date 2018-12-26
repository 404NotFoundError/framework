import ScriptLoader from './../../helpers/ScriptLoader';

const manage = new ScriptLoader(
    "body.backOffice article.user-manage"
);

const script = () => {
    console.log( 'HOST: ' + manage.host);
    console.log( 'LOCATION: ' + manage.location);
    console.log("USER MANAGE HERE");
}

manage.load(script)

export default manage;
