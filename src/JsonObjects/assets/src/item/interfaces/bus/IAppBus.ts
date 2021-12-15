import {IFactory as IComponentsFactory} from '../components/IFactory';
import {TAbstractObject} from '../../types/TAbstractObject';

export interface IAppBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execObjectModal(obj:TAbstractObject):void;
}