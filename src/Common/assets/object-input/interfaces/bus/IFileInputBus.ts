import {IFactory as IComponentsFactory} from '../../interfaces/components/IFactory';
import {TFilesBrowserIcon} from '../../types/TFilesBrowserIcon';

export interface IFileInputBus {
    setComponentsFactory(factory:IComponentsFactory):void;
    execBrowserModal():Promise<string>;
    updateFileBrowser(icons:TFilesBrowserIcon[]):void;
}