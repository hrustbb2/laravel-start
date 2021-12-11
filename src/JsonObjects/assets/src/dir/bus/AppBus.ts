import {IAppBus} from '../interfaces/bus/IAppBus';
import {TDir} from '../types/TDir';
import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';

export class AppBus implements IAppBus {

    protected componentsFactory:IComponentsFactory;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.componentsFactory = factory;
    }

    public execContextMenu(x:number, y:number, dirData:TDir)
    {
        let modal = this.componentsFactory.getContextMenu();
        modal.show(x, y, dirData);
    }

    public execDirModal(name:string = ''):Promise<string>
    {
        return new Promise<string>((resolve:any, reject:any)=>{
            let dirName = prompt('Имя папки', name);
            if(dirName){
                resolve(dirName);
            }else{
                reject();
            }
        });
    }

    public newDir(dir:TDir)
    {
        this.componentsFactory.getAppContainer().appendDir(dir);
    }

    public renamedDir(dir:TDir)
    {
        this.componentsFactory.getAppContainer().renameDir(dir);
    }

    public deletedDir(dir:TDir)
    {
        this.componentsFactory.getAppContainer().deleteDir(dir);
    }

}