import {IContextMenu} from '../interfaces/components/IContextMenu';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {TDir} from '../types/TDir';

export class ContextMenu implements IContextMenu {

    protected html:string = `
        <div class="context-menu">
            <div class="context-menu-item js-rename-button">
                Переименовать
            </div>
            <div class="context-menu-item js-delete-button">
                Удалить
            </div>
            <div class="context-menu-item">
                Item 3
            </div>
        </div>
    `;

    protected $template:JQuery;

    protected $renameButton:JQuery;

    protected $deleteButton:JQuery;

    protected appBus:IAppBus;

    protected appCommands:IAppCommands;

    protected dirData:TDir;

    public constructor()
    {
        this.$template = $(this.html);
        this.$renameButton = this.$template.find('.js-rename-button');
        this.$deleteButton = this.$template.find('.js-delete-button');
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public setAppCommands(commands:IAppCommands)
    {
        this.appCommands = commands;
    }

    public eventsListen()
    {
        this.$renameButton.on('click', ()=>{
            this.hide();
            setTimeout(()=>{
                this.appBus.execDirModal(this.dirData.name)
                    .then((newName:string)=>{
                        return this.appCommands.renameDir(this.dirData.id, newName);
                    })
                    .then((resp:any)=>{
                        if(resp.success){
                            this.appBus.renamedDir(resp.dir);
                        }
                    });
            }, 200);
        });
        this.$deleteButton.on('click', ()=>{
            this.appCommands.deleteDir(this.dirData.id)
                .then((resp:any)=>{
                    if(resp.success){
                        this.appBus.deletedDir(this.dirData);
                    }
                });
        });
    }

    public show(x:number, y:number, dirData:TDir)
    {
        this.dirData = dirData;
        this.$template.css({top: y, left: x});
        this.$template.show();
    }

    public hide()
    {
        this.$template.hide();
    }

}