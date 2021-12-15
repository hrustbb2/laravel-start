import {IAbstractObject} from './IAbstractObject';
import {IArrayItem} from './IArrayItem';

export interface IObjectsArray extends IAbstractObject {
    setItemCreator(callback:()=>IArrayItem):void;
}