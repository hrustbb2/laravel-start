import {IFactory} from './interfaces/IFactory';
import {IFactory as IComponentsFactory} from './interfaces/components/IFactory';
import {Factory as ComponentsFactory} from './components/Factory';
import {IFactory as IBusFactory} from './interfaces/bus/IFactory';
import {Factory as BusFactory} from './bus/Factory';
import 'jquery';

export class Factory implements IFactory {
    
    protected componentsFactory:IComponentsFactory = null;

    protected busFactory:IBusFactory = null;
    
    public getComponentsFactory():IComponentsFactory
    {
        if(this.componentsFactory === null){
            this.componentsFactory = new ComponentsFactory();
            this.componentsFactory.setAppFactory(this);
        }
        return this.componentsFactory;
    }

    public getBusFactory():IBusFactory
    {
        if(this.busFactory === null){
            this.busFactory = new BusFactory();
            this.busFactory.setAppFactory(this);
        }
        return this.busFactory;
    }

}