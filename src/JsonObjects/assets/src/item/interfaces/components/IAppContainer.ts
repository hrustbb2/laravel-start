import {IComposite} from '@common/object-input/interfaces/components/IComposite';
import {IObjectForm} from '@common/object-input/interfaces/components/IObjectForm';
import {IAppCommands} from '../commands/IAppCommands';
import {IObjectBus} from '@common/object-input/interfaces/bus/IObjectBus';

export interface IAppContainer {
    setCompositeCreator(callback:()=>IComposite):void;
    setAppCommands(commands:IAppCommands):void;
    setObjectForm(form:IObjectForm):void;
    setObjectBus(bus:IObjectBus):void;
    init(container:JQuery):void;
}