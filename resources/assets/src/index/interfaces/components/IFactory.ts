import {IFactory as IAppFactory} from '../../interfaces/IFactory';
import {IAppContainer} from '../../interfaces/components/IAppContainer';

export interface IFactory {
    setAppFactory(factory:IAppFactory):void;
    pageInit():void;
    getAppContainer():IAppContainer;
}