import {IComposite} from '../components/IComposite';

export interface IAppContainer {
    setComposite(composite:IComposite):void;
    init(container:JQuery):void;
}