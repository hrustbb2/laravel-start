import {TComposite} from '../../types/TComposite';

export interface IAppCommands {
    editObject(key:string, composite:TComposite):Promise<any>;
}