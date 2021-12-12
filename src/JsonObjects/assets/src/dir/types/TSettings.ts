import {TDirs} from './TDirs';
import {TItems} from './TItems';

export type TSettings = {
    currentId:string;
    dirs:TDirs;
    items:TItems;
    url:string;
    newDirUrl:string;
    renameDirUrl:string;
    deleteDirUrl:string;
}