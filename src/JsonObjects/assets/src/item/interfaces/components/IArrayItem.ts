import {IAbstractObject} from './IAbstractObject';
import {TAbstractObject} from '../../types/TAbstractObject';
import {IAppBus} from '../bus/IAppBus';

export interface IArrayItem extends IAbstractObject {
    setAppBus(bus:IAppBus):void;
    setOnDelete(callbck:(item:TAbstractObject)=>void):void;
    setOnUpdated(callback:(item:TAbstractObject)=>void):void;
    setOnDragStarted(callback:(item:IArrayItem)=>void):void;
    setOnDragMove(callback:(x:number, y:number)=>void):void;
    setOnDragEnded(callback:(item:IArrayItem)=>void):void;
    setIndex(index:number):void;
    getIndex():number;
    getData():TAbstractObject;
    setLabel(label:string):void;
}