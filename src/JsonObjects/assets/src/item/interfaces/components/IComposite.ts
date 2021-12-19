import {IAbstractObject} from './IAbstractObject';
import {TComposite} from '../../types/TComposite';
import {IAppBus} from '../bus/IAppBus';
import {TCompositeFormOptions} from '../../types/TCompositeFormOptions';

export interface IComposite extends IAbstractObject {
    collapsedTemplate:JQuery;
    setFieldCreator(callback:(type:string)=>IAbstractObject):void;
    setAppBus(bus:IAppBus):void;
    build(options:TCompositeFormOptions):Promise<TComposite>;
}