import {IFileInputBus} from '../interfaces/bus/IFileInputBus';
import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';

export class FileInputBus implements IFileInputBus {

    protected componentsFactory:IComponentsFactory;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.componentsFactory = factory;
    }

    public execBrowserModal():Promise<string>
    {
        return this.componentsFactory.getFileInputFactory().getBrowserModal().show();
    }

}