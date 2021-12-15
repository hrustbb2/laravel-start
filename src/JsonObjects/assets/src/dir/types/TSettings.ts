import {TDirs} from './TDirs';
import {TItems} from './TItems';

export type TSettings = {
    currentId:string;
    dirs:TDirs;
    items:TItems;
    url:string;
    itemUrl:string;
    newDirUrl:string;
    renameDirUrl:string;
    deleteDirUrl:string;
}