import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {IAppContainer} from '../interfaces/components/IAppContainer';
import {AppContainer} from './AppContainer';

export class Factory implements IFactory {

    protected appFactory:IAppFactory;

    protected appContainer:IAppContainer = null;

    public setAppFactory(factory:IAppFactory)
    {
        this.appFactory = factory;
    }

    public pageInit()
    {
        this.appContainer = new AppContainer();
        let container = $('.js-app-container');
        this.appContainer.init(container);
    }

    public getAppContainer()
    {
        return this.appContainer;
    }

}