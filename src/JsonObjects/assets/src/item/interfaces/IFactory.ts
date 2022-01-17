import {IFactory as IComponentsFactory} from './components/IFactory';
import {IFactory as IBusFactory} from './bus/IFactory';
import {IFactory as ICommandsFactory} from './commands/IFactory';

export interface IFactory {
    init(container:JQuery):void;
    getComponentsFactory():IComponentsFactory;
    getBusFactory():IBusFactory;
    getCommandsFactory():ICommandsFactory;
}