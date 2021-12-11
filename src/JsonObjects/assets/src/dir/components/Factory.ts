import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {IAppContainer} from '../interfaces/components/IAppContainer';
import {AppContainer} from '../components/AppContainer';
import {IDir} from '../interfaces/components/IDir';
import {Dir} from '../components/Dir';
import {IContextMenu} from '../interfaces/components/IContextMenu';
import {ContextMenu} from '../components/ContextMenu';
import {IToolsPanel} from '../interfaces/components/IToolsPanel';
import {ToolsPanel} from '../components/ToolsPanel';

export class Factory implements IFactory {

    protected appFactory:IAppFactory;

    protected appContainer:IAppContainer = null;

    protected contextMenu:IContextMenu = null;

    public setAppFactory(factory:IAppFactory)
    {
        this.appFactory = factory;
    }

    public init(appContainer:JQuery)
    {
        this.appContainer = new AppContainer();
        this.appContainer.setDirCreator(()=>{
            return this.createDir();
        });
        let toolsPanel = this.createToolsPanel();
        this.appContainer.setToolsPanel(toolsPanel);
        this.appContainer.init(appContainer);
    }

    public getAppContainer():IAppContainer
    {
        return this.appContainer;
    }

    public createDir():IDir
    {
        let dir = new Dir();
        let appBus = this.appFactory.getBusFactory().getAppBus();
        dir.setAppBus(appBus);
        return dir;
    }

    protected createToolsPanel():IToolsPanel
    {
        let toolsPaenel = new ToolsPanel();
        let appBus = this.appFactory.getBusFactory().getAppBus();
        toolsPaenel.setAppBus(appBus);
        let appCommands = this.appFactory.getCommandsFactory().getAppCommands();
        toolsPaenel.setAppCommands(appCommands);
        return toolsPaenel;
    }

    public getContextMenu():IContextMenu
    {
        if(this.contextMenu === null){
            this.contextMenu = new ContextMenu();
            let appBus = this.appFactory.getBusFactory().getAppBus();
            this.contextMenu.setAppBus(appBus);
            let appCommands = this.appFactory.getCommandsFactory().getAppCommands();
            this.contextMenu.setAppCommands(appCommands);
            $('body').append(this.contextMenu.template);
            this.contextMenu.eventsListen();
        }
        return this.contextMenu;
    }

}