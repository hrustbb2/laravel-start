import {IComposite} from '../components/IComposite';
import {TComposite} from '../../types/TComposite';
import {IAppCommands} from '../../interfaces/commands/IAppCommands';

export interface IAppContainer {
    setCompositeCreator(callback:()=>IComposite):void;
    setAppCommands(commands:IAppCommands):void;
    init(container:JQuery):void;
    render(composite:TComposite):Promise<TComposite>;
    rerender():void;
    back():void;
}