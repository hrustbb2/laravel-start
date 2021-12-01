import {IFactory as IComponentsFactory} from '../components/IFactory';
import {TDir} from '../../types/TDir';

export interface IAppBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execContextMenu(x:number, y:number):void;
    execDirModal(name?:string):Promise<string>;
    newDir(dir:TDir):void;
}