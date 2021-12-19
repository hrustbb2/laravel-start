import {IAbstractObject} from './IAbstractObject';
import {TComposite} from '../../types/TComposite';
import {IAppBus} from '../bus/IAppBus';

export interface IComposite extends IAbstractObject {
    collapsedTemplate:JQuery;
    setFieldCreator(callback:(type:string)=>IAbstractObject):void;
    setAppBus(bus:IAppBus):void;
    build():Promise<TComposite>;
    showSaveButton():void;
    showBackButton():void;
}