import {IAppContainer} from '../interfaces/components/IAppContainer';
import {IComposite} from '../interfaces/components/IComposite';
import {TComposite} from '../types/TComposite';
import {TAbstractObject} from '../types/TAbstractObject';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppContainer implements IAppContainer {

    protected $container:JQuery;

    protected $keyInput:JQuery;

    protected $keyError:JQuery;

    protected $objectForm:JQuery;

    protected $submitButton:JQuery;

    protected stack:TAbstractObject[] = [];

    protected compositeCreator:()=>IComposite;

    public setCompositeCreator(callback:()=>IComposite)
    {
        this.compositeCreator = callback;
    }

    public init(container:JQuery)
    {
        this.$container = container;
        this.$keyInput = this.$container.find('.js-key-input');
        this.$keyError = this.$container.find('.js-key-error-message');
        this.$objectForm = this.$container.find('.js-object-form-container');
        this.$submitButton = this.$container.find('.js-submit-button');
        
        this.$keyInput.val(settings.item.key);
    }

    public render(composite:TComposite):Promise<TComposite>
    {
        this.stack.push(composite);
        let c = this.compositeCreator();
        c.loadData(composite);
        let promise = c.build();
        this.$objectForm.empty();
        this.$objectForm.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
        return promise;
    }

    public rerender()
    {
        let composite = this.stack[this.stack.length - 1];
        let c = this.compositeCreator();
        c.loadData(composite);
        c.build();
        this.$objectForm.empty();
        this.$objectForm.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
    }

    public back()
    {
        this.stack.pop();
        let composite = this.stack[this.stack.length - 1];
        let c = this.compositeCreator();
        c.loadData(composite);
        c.build();
        this.$objectForm.empty();
        this.$objectForm.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
    }

}