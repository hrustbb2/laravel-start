import {IFactory as IComponentsFactory} from '../components/IFactory';
import {TAbstractObject} from '../../types/TAbstractObject';
import {TComposite} from '../../types/TComposite';

export interface IAppBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execObjectModal(obj:TAbstractObject):void;
    renderForm(composite:TComposite):void;
}