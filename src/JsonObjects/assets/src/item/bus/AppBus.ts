import {IAppBus} from '../interfaces/bus/IAppBus';
import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';
import {TComposite} from '../types/TComposite';
import {TAbstractObject} from '../types/TAbstractObject';

export class AppBus implements IAppBus {

    protected componentsFactory:IComponentsFactory;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.componentsFactory = factory;
    }

    public execObjectModal(obj:TAbstractObject):Promise<TAbstractObject>
    {
        return this.componentsFactory.getModal().show(obj);
    }

    public renderForm(data:TComposite):Promise<TComposite>
    {
        return this.componentsFactory.getAppContainer().render(data);
    }

    public rerender()
    {
        this.componentsFactory.getAppContainer().rerender();
    }

    public back()
    {
        this.componentsFactory.getAppContainer().back();
    }

}