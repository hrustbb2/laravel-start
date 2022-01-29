import {IFactory as ICommonFactory} from '../IFactory';

export interface IFactory {
    setCommonFactory(factory:ICommonFactory):void;
}