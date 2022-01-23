import {IAbstractObject} from './IAbstractObject';
import {TComposite} from '../../types/TComposite';
import {IObjectBus} from '../bus/IObjectBus';

export interface IComposite extends IAbstractObject {
    collapsedTemplate:JQuery;
    setFieldCreator(callback:(type:string)=>IAbstractObject):void;
    setObjectBus(bus:IObjectBus):void;
    build():Promise<TComposite>;
    showSaveButton():void;
    showBackButton():void;
}