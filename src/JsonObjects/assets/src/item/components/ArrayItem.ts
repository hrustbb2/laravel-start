import {IArrayItem} from '../interfaces/components/IArrayItem';
import {TAbstractObject} from '../types/TAbstractObject';
import {TComposite} from '../types/TComposite';
import {EInputTypes} from '../types/EInputTypes';
import {IAppBus} from '../interfaces/bus/IAppBus';

export class ArrayItem implements IArrayItem {

    protected html:string = `
        <button class="btn btn-info mr-1 mt-1">
            <span class="js-label"></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="js-remove-btn bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
        </button>
    `;
    
    protected $template:JQuery;

    protected $label:JQuery;

    protected $removeBtn:JQuery;

    protected data:TAbstractObject;

    protected appBus:IAppBus;

    protected onDelete:(item:TAbstractObject)=>void;

    protected onUpdated:(item:TAbstractObject)=>void;

    public constructor()
    {
        this.$template = $(this.html);
        this.$label = this.$template.find('.js-label');
        this.$removeBtn = this.$template.find('.js-remove-btn');
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public setOnDelete(callbck:(item:TAbstractObject)=>void)
    {
        this.onDelete = callbck;
    }

    public setOnUpdated(callback:(item:TAbstractObject)=>void)
    {
        this.onUpdated = callback;
    }

    public loadData(data:TAbstractObject):void
    {
        this.data = data;
        this.$label.text(data.description);
    }

    public showErrors():void
    {
        this.$template.removeClass('btn-info');
        this.$template.addClass('btn-danger');
    }

    public clearErrors():void
    {
        this.$template.removeClass('btn-danger');
        this.$template.addClass('btn-info');
    }

    public serialize():TAbstractObject
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
        this.$removeBtn.on('click', (e:Event)=>{
            e.stopPropagation();
            this.onDelete(this.data);
        });
        this.$template.on('click', (e:Event)=>{
            e.preventDefault();
            if(this.data.type == EInputTypes.composite){
                this.appBus.renderForm(<TComposite>this.deepClone(this.data))
                    .then((updatedItem:TComposite)=>{
                        (<TComposite>this.data).fields = updatedItem.fields;
                        this.onUpdated(updatedItem);
                        this.appBus.back();
                    });
            }else{
                this.appBus.execObjectModal(this.data)
                    .then((updatedItem:TComposite)=>{
                        this.data = updatedItem;
                        this.onUpdated(updatedItem);
                        this.appBus.rerender();
                    });
            }
        });
    }

}