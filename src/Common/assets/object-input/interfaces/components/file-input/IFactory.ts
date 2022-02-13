import {IFileInput} from './IFileInput';
import {IBrowserModal} from './IBrowserModal';
import {IFactory as IComponentsFactory} from '../IFactory';
import {IFileContextMenu} from './IFileContextMenu';

export interface IFactory {
    setComponentsFactory(factory:IComponentsFactory):void;
    createFileInput():IFileInput;
    getBrowserModal():IBrowserModal;
    getFileContextMenu():IFileContextMenu;
}