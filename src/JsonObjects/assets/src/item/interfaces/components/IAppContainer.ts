import {IComposite} from '../components/IComposite';
import {IObjectForm} from './IObjectForm';
import {IAppCommands} from '../commands/IAppCommands';
import {IObjectBus} from '../bus/IObjectBus';

export interface IAppContainer {
    setCompositeCreator(callback:()=>IComposite):void;
    setAppCommands(commands:IAppCommands):void;
    setObjectForm(form:IObjectForm):void;
    setObjectBus(bus:IObjectBus):void;
    init(container:JQuery):void;
}