import {TComposite} from '../../types/TComposite';

export interface IAppCommands {
    editObject(key:string, formData:FormData):Promise<any>;
}