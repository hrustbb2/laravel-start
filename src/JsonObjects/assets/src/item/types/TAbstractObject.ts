import {EInputTypes} from '../types/EInputTypes';
import {TComposite} from '../types/TComposite';

export interface TAbstractObject {
    container?:TComposite;
    type:EInputTypes;
    description:string;
    errors:string[];
}