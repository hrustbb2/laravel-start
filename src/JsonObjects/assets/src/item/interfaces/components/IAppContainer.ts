import {IComposite} from '../components/IComposite';
import {TComposite} from '../../types/TComposite';
import {TCompositeFormOptions} from '../../types/TCompositeFormOptions';

export interface IAppContainer {
    setCompositeCreator(callback:()=>IComposite):void;
    init(container:JQuery):void;
    render(composite:TComposite, options?:TCompositeFormOptions):Promise<TComposite>;
}