import {IFilesBrowserCommands} from '../../commands/IFilesBrowserCommands';
import {IItem} from './IItem';
import {TFilesBrowserIcon} from '../../../types/TFilesBrowserIcon';

export interface IBrowserModal {
    template:JQuery;
    setItemCreator(creator:()=>IItem):void;
    setFilesBrowserCommands(commands:IFilesBrowserCommands):void;
    show():Promise<string>;
    hide():void;
    eventsListen():void;
    update(icons:TFilesBrowserIcon[]):void;
}