import {IFactory as IComponentsFactory} from '../components/IFactory';

export interface IAppBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execContextMenu(x:number, y:number):void;
    execDirModal(name?:string):Promise<string>;
}