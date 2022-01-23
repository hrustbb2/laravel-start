import {IFactory as IAppFactory} from '../IFactory';
import {IObjectBus} from './IObjectBus';

export interface IFactory {
    setAppFactory(factory:IAppFactory):void;
    getObjectBus():IObjectBus;
}