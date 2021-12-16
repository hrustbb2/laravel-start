import {IAppContainer} from '../interfaces/components/IAppContainer';
import {IComposite} from '../interfaces/components/IComposite';
import {TComposite} from '../types/TComposite';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppContainer implements IAppContainer {

    protected $container:JQuery;

    protected $keyInput:JQuery;

    protected $keyError:JQuery;

    protected $objectForm:JQuery;

    protected $submitButton:JQuery;

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

    public render(composite:TComposite)
    {
        let c = this.compositeCreator();
        c.loadData(composite);
        c.build();
        this.$objectForm.empty();
        this.$objectForm.append(c.template);
        c.eventsListen();
    }

}