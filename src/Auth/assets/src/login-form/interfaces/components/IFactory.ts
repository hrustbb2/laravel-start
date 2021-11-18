import {IFactory as IAppFactory} from '../IFactory';
import {ILoginForm} from './ILoginForm';

export interface IFactory {
    setAppFactory(factory:IAppFactory):void;
    init(container:JQuery):void;
    getLoginForm():ILoginForm;
}