import {IFactory as IComponentsFactory} from '../../interfaces/components/IFactory';

export interface IFileInputBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execBrowserModal():Promise<string>;
}