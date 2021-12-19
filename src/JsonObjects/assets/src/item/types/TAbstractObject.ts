import {EInputTypes} from '../types/EInputTypes';
import {TComposite} from '../types/TComposite';

export interface TAbstractObject {
    type:EInputTypes;
    description:string;
    errors:string[];
}