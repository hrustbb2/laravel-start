import {IComposite} from '../interfaces/components/IComposite';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {EInputTypes} from '../types/EInputTypes';
import {TComposite} from '../types/TComposite';
import {TObjectsArray} from '../types/TObjectsArray';
import {TCompositeFormOptions} from '../types/TCompositeFormOptions';
import { TAbstractObject } from '../types';

type TFields = {
    [field:string]:IAbstractObject;
}

export class Composite implements IComposite {

    protected html:string = `
        <div>
            <div class="js-body"></div>
            <div class="object-field">
                <button class="btn btn-info btn-sm js-save-button" style="display:none">Save</button>
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

    protected $saveButton:JQuery;
    
    protected data:TComposite;

    protected appBus:IAppBus;

    protected fields:TFields = {};

    protected resolve:any;

    protected reject:any;

    protected fieldCreator:(type:string)=>IAbstractObject;

    public constructor()
    {
        this.$template = $(this.html);
        this.$body = this.$template.find('.js-body');
        this.$backButton = this.$template.find('.js-back-button');
        this.$saveButton = this.$template.find('.js-save-button');
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
                (<TObjectsArray>data.fields[name]).item_proto.container = this.data;
            }
            field.loadData(data.fields[name]);
            this.fields[name] = field;
        }
    }
    
    public build(options:TCompositeFormOptions):Promise<TComposite>
    {
        return new Promise<TComposite>((resolve:any, reject:any)=>{
            this.resolve = resolve;
            this.reject = reject;
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
            }else{
                this.$backButton.hide();
            }
            this.$saveButton.hide();
            if(options && options.showSaveButton){
                this.$saveButton.show();
            }
        });
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

    protected deepClone(obj:any)
    {
        if(Array.isArray(obj)){
            let result:any[] = [];
            for(let item of obj){
                if(typeof item === 'object'){
                    result.push(this.deepClone(item));
                }else{
                    result.push(item);
                }
            }
            return result;
        }else{
            let result:any = {};
            for(let key in obj){
                if(typeof obj[key] === 'object' && obj[key] !== null && key !== 'container'){
                    result[key] = this.deepClone(obj[key]);
                }else{
                    result[key] = obj[key];
                }
            }
            return result;
        }
    }

    public eventsListen()
    {
        for(let name in this.fields){
            this.fields[name].eventsListen();
        }
        this.$collapsedTemplate.on('click', (e:Event)=>{
            e.preventDefault();
            this.appBus.renderForm(this.deepClone(this.data))
                .then((updatetObj:TComposite)=>{
                    this.data = updatetObj;
                    if(this.data.container){
                        
                    }
                });
        });
        this.$backButton.on('click', (e:Event)=>{
            e.preventDefault();
            this.appBus.renderForm(this.data.container);
            // this.reject();
        });
        this.$saveButton.on('click', (e:Event)=>{
            e.preventDefault();
            this.resolve(this.data);
        });
    }

}