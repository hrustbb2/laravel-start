import {IObjectsArray} from '../interfaces/components/IObjectsArray';
import {IArrayItem} from '../interfaces/components/IArrayItem';
import {TObjectsArray} from '../types/TObjectsArray';
import {IAppBus} from '../interfaces/bus/IAppBus';
import {EInputTypes} from '../types/EInputTypes';
import {TValueObject} from '../types/TValueObject';
import { TAbstractObject, TComposite } from '../types';

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
        for(let i in data.items){
            let item = this.itemCreator();
            item.setOnDelete(()=>{
                this.data.items.splice(+i, 1);
                this.appBus.rerender();
            });
            item.setOnUpdated((item:TAbstractObject)=>{
                this.data.items[i] = item;
                this.appBus.rerender();
            });
            item.loadData(data.items[i]);
            this.items.push(item);
            this.$items.append(item.template);
        }
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
            if(this.data.item_proto[0].type == EInputTypes.composite){
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