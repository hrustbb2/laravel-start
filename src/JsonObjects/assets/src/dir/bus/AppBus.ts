import {IAppBus} from '../interfaces/bus/IAppBus';
import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';

export class AppBus implements IAppBus {

    protected appFactory:IComponentsFactory;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.appFactory = factory;
    }

    public execContextMenu(x:number, y:number)
    {
        let modal = this.appFactory.getContextMenu();
        modal.show(x, y);
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

}