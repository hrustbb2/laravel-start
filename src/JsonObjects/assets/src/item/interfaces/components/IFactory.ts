import {IFactory as IAppFactory} from '../IFactory';
import {IAppContainer} from '../components/IAppContainer';
import {IModal} from '../components/IModal';
import {IAbstractObject} from '../components/IAbstractObject';
import {EInputTypes} from '../../types/EInputTypes';

export interface IFactory {
    setAppFactory(factory:IAppFactory):void;
    getAppContainer():IAppContainer;
    getModal():IModal;
    init(container:JQuery):void;
    createInputField(type:EInputTypes):IAbstractObject;
}