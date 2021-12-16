import {IObjectsArray} from '../interfaces/components/IObjectsArray';
import {IArrayItem} from '../interfaces/components/IArrayItem';
import {TObjectsArray} from '../types/TObjectsArray';

export class ObjectsArray implements IObjectsArray {

    protected html:string = `
        <div class="object-field">
            <div class="js-label"></div>
            <div class="js-items"></div>
        </div>
    `;

    protected $template:JQuery;

    protected $label:JQuery;

    protected $items:JQuery;

    protected data:TObjectsArray;

    protected items:IArrayItem[] = [];

    protected itemCreator:()=>IArrayItem;

    public constructor()
    {
        this.$template = $(this.html);
        this.$label = this.$template.find('.js-label');
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

    public loadData(data:TObjectsArray):void
    {
        this.data = data;
        this.$label.text(data.description);
        for(let itemData of data.items){
            let item = this.itemCreator();
            itemData.container = this.data.container;
            item.loadData(itemData);
            this.items.push(item);
            this.$items.append(item.template);
        }
    }

    public showErrors():void
    {
        
    }

    public clearErrors():void
    {
        
    }

    public serialize():TObjectsArray
    {
        return this.data;
    }

    public eventsListen()
    {
        for(let item of this.items){
            item.eventsListen();
        }
    }

}