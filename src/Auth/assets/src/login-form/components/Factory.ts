import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {ILoginForm} from '../interfaces/components/ILoginForm';
import {LoginForm} from './LoginForm';

export class Factory implements IFactory {

    protected appFactory:IAppFactory;

    protected loginForm:ILoginForm = null;

    public setAppFactory(factory:IAppFactory)
    {
        this.appFactory = factory;
    }

    public init(container:JQuery)
    {
        let loginForm = container.find('.js-login-form-container');
        this.loginForm = new LoginForm();
        let appCommands = this.appFactory.getCommandsFactory().getAppCommands();
        this.loginForm.setAppCommands(appCommands);
        this.loginForm.init(loginForm);
    }

    public getLoginForm()
    {
        return this.loginForm;
    }

}