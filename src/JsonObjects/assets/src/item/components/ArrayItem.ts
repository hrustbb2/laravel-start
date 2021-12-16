import {IArrayItem} from '../interfaces/components/IArrayItem';
import {TAbstractObject} from '../types/TAbstractObject';
import {TComposite} from '../types/TComposite';
import {EInputTypes} from '../types/EInputTypes';
import {IAppBus} from '../interfaces/bus/IAppBus';

export class ArrayItem implements IArrayItem {

    protected html:string = `
        <button class="btn btn-info mr-1 mt-1"></button>
    `;
    
    protected $template:JQuery;

    protected data:TAbstractObject;

    protected appBus:IAppBus;

    public constructor()
    {
        this.$template = $(this.html);
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setAppBus(bus:IAppBus)
    {
        this.appBus = bus;
    }

    public loadData(data:TAbstractObject):void
    {
        this.data = data;
        this.$template.text(data.description);
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

    public eventsListen()
    {
        this.$template.on('click', (e:Event)=>{
            e.preventDefault();
            if(this.data.type == EInputTypes.composite){
                this.appBus.renderForm(<TComposite>this.data);
            }else{
                this.appBus.execObjectModal(this.data);
            }
        });
    }

}