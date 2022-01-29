import {IAppContainer} from '../interfaces/components/IAppContainer';

export class AppContainer implements IAppContainer {

    protected $container:JQuery;

    public init(container:JQuery)
    {
        this.$container = container;
    }

}