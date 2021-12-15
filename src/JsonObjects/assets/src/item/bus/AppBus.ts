import {IAppBus} from '../interfaces/bus/IAppBus';
import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';
import {TAbstractObject} from '../types/TAbstractObject';

export class AppBus implements IAppBus {

    protected componentsFactory:IComponentsFactory;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.componentsFactory = factory;
    }

    public execObjectModal(obj:TAbstractObject)
    {
        this.componentsFactory.getModal().show(obj);
    }

}