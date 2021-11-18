import {IAppCommands} from '../commands/IAppCommands';

export interface ILoginForm {
    setAppCommands(commands:IAppCommands):void;
    init(container:JQuery):void;
}