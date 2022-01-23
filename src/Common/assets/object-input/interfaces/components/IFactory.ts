import {IFactory as IAppFactory} from '../IFactory';
import {IModal} from '../components/IModal';
import {IAbstractObject} from '../components/IAbstractObject';
import {IComposite} from '../components/IComposite';
import {EInputTypes} from '../../types/EInputTypes';
import {IObjectForm} from './IObjectForm';

export interface IFactory {
    setAppFactory(factory:IAppFactory):void;
    getModal():IModal;
    createInputField(type:EInputTypes):IAbstractObject;
    getObjectForm(key:string):IObjectForm;
    createComposite():IComposite;
}