import {IFactory} from '../interfaces/bus/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {AppBus} from './AppBus';

export class Factory implements IFactory {

    protected appFactory:IAppFactory;

    protected appBus:IAppBus = null;

    public setAppFactory(factory:IAppFactory)
    {
        this.appFactory = factory;
    }

    public getAppBus():IAppBus
    {
        if(this.appBus === null){
            this.appBus = new AppBus();
            let componentsFactory = this.appFactory.getComponentsFactory();
            this.appBus.setComponentsFactory(componentsFactory);
        }
        return this.appBus;
    }

}