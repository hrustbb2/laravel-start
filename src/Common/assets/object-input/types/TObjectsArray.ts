import {TAbstractObject} from './TAbstractObject';

export interface TObjectsArray extends TAbstractObject {
    item_proto:TAbstractObject[];
    label_field:string;
    items:TAbstractObject[];
}