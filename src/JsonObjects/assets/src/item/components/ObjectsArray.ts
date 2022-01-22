import {IObjectsArray} from '../interfaces/components/IObjectsArray';
import {IArrayItem} from '../interfaces/components/IArrayItem';
import {TObjectsArray} from '../types/TObjectsArray';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {TValueObject} from '../types/TValueObject';
import { TAbstractObject, TComposite } from '../types';

class DropableElement {

    private html:string = `
        <div class="array-item-dropable mt-1"></div>
    `;

    private $template:JQuery;

    private _index:number;

    public get template():JQuery
    {
        return this.$template;
    }

    public get index():number
    {
        return this._index;
    }

    public constructor(index:number)
    {
        this.$template = $(this.html);
        this._index = index;
    }

    public getRectangle()
    {
        return this.template[0].getBoundingClientRect();
    }

    public setActive()
    {
        this.$template.addClass('array-item-dropable-active');
    }

    public unsetActive()
    {
        this.$template.removeClass('array-item-dropable-active');
    }

}

export class ObjectsArray implements IObjectsArray {

    protected html:string = `
        <div class="object-field">
            <div class="object-array-label-row">
                <div class="js-label"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="add-item-btn js-add-item-btn bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </div>
            <div class="js-items"></div>
        </div>
    `;

    protected $template:JQuery;

    protected $label:JQuery;

    protected $addItemBtn:JQuery;

    protected $items:JQuery;

    protected appBus:IAppBus;

    protected data:TObjectsArray;

    protected items:IArrayItem[] = [];

    protected itemCreator:()=>IArrayItem;

    protected dropableElements:DropableElement[] = [];

    private currendDropable:DropableElement;

    public constructor()
    {
        this.$template = $(this.html);
        this.$label = this.$template.find('.js-label');
        this.$addItemBtn = this.$template.find('.js-add-item-btn');
        this.$items = this.$template.find('.js-items');
    }

    public setItemCreator(callback:()=>IArrayItem)
    {
        this.itemCreator = callback;
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public loadData(data:TObjectsArray):void
    {
        this.data = data;
        this.$label.text(data.description);
        this.renderItems();
    }

    protected renderItems()
    {
        this.$items.empty();
        for(let i in this.data.items){
            let item = this.itemCreator();
            item.setIndex(+i);
            item.setOnDelete(()=>{
                this.data.items.splice(+i, 1);
                this.appBus.rerender();
            });
            item.setOnUpdated((item:TAbstractObject)=>{
                this.data.items[i] = item;
                this.appBus.rerender();
            });
            item.loadData(this.data.items[i]);
            let descriptionField = this.data.label_field;
            if(descriptionField && this.data.items[i].composite){
                let label = (<TValueObject>(<TComposite>this.data.items[i]).fields[descriptionField]).value;
                item.setLabel(label);
            }

            item.setOnDragStarted((item:IArrayItem) => {
                //this.draggingItem = item;
                let index = item.getIndex();
                this.dropableElements[index].template.hide();
            });
            item.setOnDragMove((x:number, y:number)=>{
                let dr = this.findDroppable(x, y);
                if(this.currendDropable && !dr){
                    this.currendDropable.unsetActive();
                }
                if(!this.currendDropable && dr){
                    dr.setActive();
                }
                this.currendDropable = dr;
            });
            item.setOnDragEnded((item:IArrayItem)=>{
                if(this.currendDropable){
                    let newIndex = this.currendDropable.index;
                    item.setIndex(newIndex);
                    item.template.remove();
                    this.reorderItems();
                }else{
                    item.template.remove();
                    this.reorderItems();
                }
            });

            let dropableEl = new DropableElement(this.items.length);
            this.dropableElements.push(dropableEl);

            this.items.push(item);
            this.$items.append(dropableEl.template);
            this.$items.append(item.template);
        }
    }

    protected findDroppable(x:number, y:number)
    {
        for(let dr of this.dropableElements){
            let rect = dr.getRectangle();
            if(rect.left < x && rect.right > x && rect.top < y && rect.bottom > y){
                return dr;
            }
        }
        return null;
    }

    protected reorderItems()
    {
        let sortedItems = this.items.sort((a:IArrayItem, b:IArrayItem):number => {
            let d = a.getIndex() - b.getIndex();
            return (d == 0) ? -1 : d;
        });
        this.data.items = [];
        this.items = [];
        this.dropableElements = [];
        for(let item of sortedItems){
            this.data.items.push(item.getData());
        }
        this.renderItems();
    }

    public showErrors():void
    {
        for(let item of this.items){
            item.showErrors();
        }
    }

    public clearErrors():void
    {
        for(let item of this.items){
            item.clearErrors();
        }
    }

    public serialize():TObjectsArray
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
        for(let item of this.items){
            item.eventsListen();
        }
        this.$addItemBtn.on('click', (e:Event)=>{
            e.preventDefault();
            if(this.data.item_proto[0].composite){
                this.appBus.renderForm(<TComposite>this.deepClone(this.data.item_proto[0]))
                    .then((newItem:TComposite)=>{
                        this.data.items.push(newItem);
                        this.appBus.back();
                    });
            }else{
                this.appBus.execObjectModal(this.deepClone(this.data.item_proto[0]))
                    .then((newItem:TValueObject)=>{
                        this.data.items.push(newItem);
                        this.appBus.rerender();
                    })
            }
        });
    }

}