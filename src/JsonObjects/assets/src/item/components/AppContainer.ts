import {IAppContainer} from '../interfaces/components/IAppContainer';
import {IComposite} from '../interfaces/components/IComposite';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppContainer implements IAppContainer {

    protected $container:JQuery;

    protected $keyInput:JQuery;

    protected $keyError:JQuery;

    protected $objectForm:JQuery;

    protected $submitButton:JQuery;

    protected composite:IComposite;

    public setComposite(composite:IComposite)
    {
        this.composite = composite;
    }

    public init(container:JQuery)
    {
        this.$container = container;
        this.$keyInput = this.$container.find('.js-key-input');
        this.$keyError = this.$container.find('.js-key-error-message');
        this.$objectForm = this.$container.find('.js-object-form-container');
        this.$submitButton = this.$container.find('.js-submit-button');
        
        this.$keyInput.val(settings.item.key);
        this.composite.loadData(settings.item.object);
        this.composite.build();
        this.$objectForm.append(this.composite.template);
        this.composite.eventsListen();
    }

}