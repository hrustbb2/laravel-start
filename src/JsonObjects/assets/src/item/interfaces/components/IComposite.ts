import {IAbstractObject} from './IAbstractObject';

export interface IComposite extends IAbstractObject {
    setFieldCreator(callback:(type:string)=>IAbstractObject):void;
    build():void;
}