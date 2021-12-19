import {IAbstractObject} from './IAbstractObject';
import {TAbstractObject} from '../../types/TAbstractObject';
import {IAppBus} from '../bus/IAppBus';

export interface IArrayItem extends IAbstractObject {
    setAppBus(bus:IAppBus):void;
    setOnDelete(callbck:(item:TAbstractObject)=>void):void;
    setOnUpdated(callback:(item:TAbstractObject)=>void):void;
}