import {IFactory as IComponentsFactory} from '../components/IFactory';
import {TDir} from '../../types/TDir';

export interface IAppBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execContextMenu(x:number, y:number, dirData:TDir):void;
    execDirModal(name?:string):Promise<string>;
    newDir(dir:TDir):void;
    renamedDir(dir:TDir):void;
    deletedDir(dir:TDir):void;
}