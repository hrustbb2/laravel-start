import {IFactory} from './interfaces/IFactory';
import {IFactory as IComponentsFactory} from './interfaces/components/IFactory';
import {Factory as ComponentsFactory} from './components/Factory';
import {IFactory as ICommandsFactory} from './interfaces/commands/IFactory';
import {Factory as CommandsFactory} from './commands/Factory';

export class Factory implements IFactory {

    protected componentsFactory:IComponentsFactory = null;

    protected commandsFactory:ICommandsFactory = null;

    public init(container:JQuery)
    {
        this.getComponentsFactory().init(container);
    }
    
    public getComponentsFactory()
    {
        if(this.componentsFactory === null){
            this.componentsFactory = new ComponentsFactory();
            this.componentsFactory.setAppFactory(this);
        }
        return this.componentsFactory;
    }

    public getCommandsFactory()
    {
        if(this.commandsFactory === null){
            this.commandsFactory = new CommandsFactory();
        }
        return this.commandsFactory;
    }

}