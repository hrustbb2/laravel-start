import {ILoginForm} from '../interfaces/components/ILoginForm';
import 'jquery';
import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {TErrors} from '../types/TErrors';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class LoginForm implements ILoginForm {

    protected $container:JQuery;

    protected $form:JQuery;

    protected $emailInput:JQuery;

    protected $emailError:JQuery;

    protected $passwordInput:JQuery;

    protected $passwordError:JQuery;

    protected appCommands:IAppCommands;

    public setAppCommands(commands:IAppCommands)
    {
        this.appCommands = commands;
    }

    public init(container:JQuery)
    {
        this.$container = container;
        this.$form = this.$container.find('.js-form');
        this.$emailInput = this.$form.find('.js-email-input');
        this.$emailError = this.$form.find('.js-email-error');
        this.$passwordInput = this.$form.find('.js-password-input');
        this.$passwordError = this.$form.find('.js-password-error');
        this.eventsListen();
    }

    protected eventsListen()
    {
        this.$form.on('submit', (e:Event)=>{
            e.preventDefault();
            let email = <string>this.$emailInput.val();
            let password = <string>this.$passwordInput.val();
            this.appCommands.login(email, password)
                .then((resp:any)=>{
                    if(resp.success){
                        window.location.href = settings.successUrl;
                    }
                })
                .catch((reason:any)=>{
                    if(reason.errors){
                        this.showErrors(reason.errors);
                    }
                });
        });
    }

    protected showErrors(errors:TErrors)
    {
        if(errors['email']){
            this.$emailError.text(errors['email'][0]);
        }
        if(errors['password']){
            this.$passwordError.text(errors['password'][0]);
        }
    }

}