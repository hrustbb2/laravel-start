import {IFilesBrowserCommands} from '../../commands/IFilesBrowserCommands';
import {IItem} from './IItem';

export interface IBrowserModal {
    template:JQuery;
    setItemCreator(creator:()=>IItem):void;
    setFilesBrowserCommands(commands:IFilesBrowserCommands):void;
    show():Promise<string>;
    hide():void;
    eventsListen():void;
}