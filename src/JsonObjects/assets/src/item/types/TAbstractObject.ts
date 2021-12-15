import {EInputTypes} from '../types/EInputTypes';

export interface TAbstractObject {
    type:EInputTypes;
    description:string;
    errors:string[];
}