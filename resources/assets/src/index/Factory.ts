import {IFactory} from './interfaces/IFactory';
import {IFactory as IComponentsFactory} from './interfaces/components/IFactory';
import {Factory as ComponentsFactory} from './components/Factory';

export class Factory implements IFactory {
    
    protected componentsFactory:IComponentsFactory = null;

    public getComponentsFactory()
    {
        if(this.componentsFactory === null){
            this.componentsFactory = new ComponentsFactory();
            this.componentsFactory.setAppFactory(this);
        }
        return this.componentsFactory;
    }

}