import {IAppContainer} from '../interfaces/components/IAppContainer';
import {IDir} from '../interfaces/components/IDir';
import {IToolsPanel} from '../interfaces/components/IToolsPanel';
import * as types from '../types';

export class AppContainer implements IAppContainer {

    protected $container:JQuery;

    protected $itemsContainer:JQuery;

    protected toolsPanel:IToolsPanel;

    protected dirCreator:()=>IDir;

    public setToolsPanel(toolsPanel:IToolsPanel)
    {
        this.toolsPanel = toolsPanel;
    }

    public init(container:JQuery)
    {
        this.$container = container;
        this.$itemsContainer = this.$container.find('.js-items-container');
        let toolsPanelContainer = this.$container.find('.js-tools-panel');
        this.toolsPanel.init(toolsPanelContainer);
        this.eventsListen();
    }

    protected eventsListen()
    {
        
    }

    public setDirCreator(callback:()=>IDir)
    {
        this.dirCreator = callback;
    }

    public loadDirs(dirsData:types.TDirs)
    {
        for(let id in dirsData){
            let dir = this.dirCreator();
            dir.load(dirsData[id]);
            this.$itemsContainer.append(dir.template);
            dir.eventsListen();
        }
    }

}