import {TAbstractObject} from './TAbstractObject';

export interface TObjectsArray extends TAbstractObject {
    items_type:string;
    items:TAbstractObject[];
}