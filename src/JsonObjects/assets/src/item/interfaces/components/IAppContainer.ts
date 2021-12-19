import {IComposite} from '../components/IComposite';
import {TComposite} from '../../types/TComposite';

export interface IAppContainer {
    setCompositeCreator(callback:()=>IComposite):void;
    init(container:JQuery):void;
    render(composite:TComposite):Promise<TComposite>;
    rerender():void;
    back():void;
}