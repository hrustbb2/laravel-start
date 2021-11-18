import {IFactory} from '../interfaces/commands/IFactory';
import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {AppCommands} from './AppCommands';

export class Factory implements IFactory {

    protected appCommands:IAppCommands = null;

    public getAppCommands():IAppCommands
    {
        if(this.appCommands === null){
            this.appCommands = new AppCommands();
        }
        return this.appCommands;
    }

}