import {IToolsPanel} from '../interfaces/components/IToolsPanel';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {IAppCommands} from '../interfaces/commands/IAppCommands';
import * as types from '../types';

declare let settings:types.TSettings;

export class ToolsPanel implements IToolsPanel {

    protected $container:JQuery;

    protected appBus:IAppBus;

    protected appCommands:IAppCommands;

    protected $addDirButton:JQuery;

    protected $deleteButton:JQuery;

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public setAppCommands(commands:IAppCommands)
    {
        this.appCommands = commands;
    }

    public init(container:JQuery)
    {
        this.$container = container;
        this.$addDirButton = this.$container.find('.js-add-button');
        this.$deleteButton = this.$container.find('.js-delete-button');
        this.eventsListen();
    }

    protected eventsListen()
    {
        this.$addDirButton.on('click', ()=>{
            this.appBus.execDirModal()
                .then((name:string)=>{
                    return this.appCommands.newDir(settings.currentId, name);
                })
                .then((resp:any)=>{
                    console.log(resp);
                });
        });
    }

}