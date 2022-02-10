import {IBrowserModal} from '../../interfaces/components/file-input/IBrowserModal';
import {IFilesBrowserCommands} from '../../interfaces/commands/IFilesBrowserCommands';
import {IItem} from '../../interfaces/components/file-input/IItem';
import {TFilesBrowserIcon} from '../../types/TFilesBrowserIcon';
import 'jquery';
import 'bootstrap';

export class BrowserModal implements IBrowserModal {

    protected html:string = `
        <div class="fb-modal modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body js-body">
                        <div class="files-container js-files-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary js-save-button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    protected $template:JQuery;

    protected $body:JQuery;

    protected $jsContainer:JQuery;

    protected $saveButton:JQuery;

    protected filesBrowserCommands:IFilesBrowserCommands;

    protected resolve:any;

    protected reject:any;

    protected createItem:()=>IItem;

    public setItemCreator(creator:()=>IItem)
    {
        this.createItem = creator;
    }

    public constructor()
    {
        this.$template = $(this.html);
        this.$body = this.$template.find('.js-body');
        this.$jsContainer = this.$template.find('.js-files-container');
        this.$saveButton = this.$template.find('.js-save-button');
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setFilesBrowserCommands(commands:IFilesBrowserCommands)
    {
        this.filesBrowserCommands = commands;
    }

    public show():Promise<string>
    {
        return new Promise<string>((resolve:any, reject:any)=>{
            this.resolve = resolve;
            this.reject = reject;
            let items = this.filesBrowserCommands.getDir('')
                .then((resp:any)=>{
                    this.$jsContainer.empty();
                    for(let data of resp){
                        if(data.name == '.'){
                            continue;
                        }
                        let item = this.createItem();
                        item.setOnSelectedFile((fileName:string)=>{
                            this.resolve(fileName);
                            this.hide();
                        });
                        item.load(data);
                        this.$jsContainer.append(item.template);
                        item.eventsListen();
                    }
                });
            console.log(items);
            (<any>this.$template).modal('show');
        });
    }

    public hide()
    {
        (<any>this.$template).modal('hide');
    }

    public eventsListen()
    {
        this.$saveButton.on('click', (e:Event)=>{
            e.preventDefault();
            this.hide();
            this.resolve('qwe');
        });
    }

    public update(icons:TFilesBrowserIcon[])
    {
        this.$jsContainer.empty();
        for(let data of icons){
            if(data.name == '.'){
                continue;
            }
            let item = this.createItem();
            item.setOnSelectedFile((fileName:string)=>{
                this.resolve(fileName);
                this.hide();
            });
            item.load(data);
            this.$jsContainer.append(item.template);
            item.eventsListen();
        }
    }

}