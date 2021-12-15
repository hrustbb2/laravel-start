import {IAbstractObject} from './IAbstractObject';
import {IAppBus} from '../bus/IAppBus';

export interface IArrayItem extends IAbstractObject {
    setAppBus(bus:IAppBus):void;
}