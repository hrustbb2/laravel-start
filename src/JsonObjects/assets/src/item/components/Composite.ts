import {IComposite} from '../interfaces/components/IComposite';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {EInputTypes} from '../types/EInputTypes';
import {TComposite} from '../types/TComposite';

type TFields = {
    [field:string]:IAbstractObject;
}

export class Composite implements IComposite {

    protected html:string = `
        <div>
            <div class="js-body"></div>
            <div class="object-field">
                <button class="btn btn-secondary btn-sm js-back-button" style="display:none">Back</button>
            </div>
        </div>
    `;

    protected collapsedHtml:string = `
        <div class="object-field">
            <button class="btn btn-info">Obj</button>
        </div>
    `;

    protected $template:JQuery;

    protected $collapsedTemplate:JQuery;

    protected $body:JQuery;

    protected $backButton:JQuery;
    
    protected data:TComposite;

    protected appBus:IAppBus;

    protected fields:TFields = {};

    protected fieldCreator:(type:string)=>IAbstractObject;

    public constructor()
    {
        this.$template = $(this.html);
        this.$body = this.$template.find('.js-body');
        this.$backButton = this.$template.find('.js-back-button');
        this.$collapsedTemplate = $(this.collapsedHtml);
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public get collapsedTemplate():JQuery
    {
        return this.$collapsedTemplate;
    }

    public setFieldCreator(callback:(type:string)=>IAbstractObject)
    {
        this.fieldCreator = callback;
    }

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public loadData(data:TComposite):void
    {
        this.data = data;
        for(let name in data.fields){
            let field = this.fieldCreator(data.fields[name].type);
            if(data.fields[name].type == EInputTypes.composite){
                data.fields[name].container = this.data;
            }
            if(data.fields[name].type == EInputTypes.array){
                data.fields[name].container = this.data;
            }
            field.loadData(data.fields[name]);
            this.fields[name] = field;
        }
    }
    
    public build():void
    {
        this.$body.empty();
        for(let name in this.fields){
            if(this.fields[name].serialize().type == EInputTypes.composite){
                this.$body.append((<IComposite>this.fields[name]).collapsedTemplate);
                continue;
            }
            this.$body.append(this.fields[name].template);
        }
        if(this.data.container){
            this.$backButton.show();
        }
    }

    public showErrors():void
    {

    }

    public clearErrors():void
    {

    }

    public serialize():TComposite
    {
        return this.data;
    }

    public eventsListen()
    {
        for(let name in this.fields){
            this.fields[name].eventsListen();
        }
        this.$collapsedTemplate.on('click', (e:Event)=>{
            e.preventDefault();
            this.appBus.renderForm(this.data);
        });
        this.$backButton.on('click', (e:Event)=>{
            e.preventDefault();
            this.appBus.renderForm(this.data.container);
        });
    }

}