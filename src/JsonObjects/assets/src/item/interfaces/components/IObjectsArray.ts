import {IAbstractObject} from './IAbstractObject';
import {IArrayItem} from './IArrayItem';
import {IAppBus} from '../bus/IAppBus';

export interface IObjectsArray extends IAbstractObject {
    setAppBus(bus:IAppBus):void;
    setItemCreator(callback:()=>IArrayItem):void;
}