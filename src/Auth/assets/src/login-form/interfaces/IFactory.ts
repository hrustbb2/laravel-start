import {IFactory as IComponentsFacory} from './components/IFactory';
import {IFactory as ICommandsFactory} from './commands/IFactory';

export interface IFactory {
    init(container:JQuery):void;
    getComponentsFactory():IComponentsFacory;
    getCommandsFactory():ICommandsFactory;
}