import {IComposite} from '../interfaces/components/IComposite';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import {TComposite} from '../types/TComposite';

type TFields = {
    [field:string]:IAbstractObject;
}

export class Composite implements IComposite {

    protected html:string = `
        <div></div>
    `;

    protected $template:JQuery;

    protected data:TComposite;

    protected fields:TFields = {};

    protected fieldCreator:(type:string)=>IAbstractObject;

    public constructor()
    {
        this.$template = $(this.html);
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setFieldCreator(callback:(type:string)=>IAbstractObject)
    {
        this.fieldCreator = callback;
    }

    public loadData(data:TComposite):void
    {
        this.data = data;
        for(let name in data.fields){
            let field = this.fieldCreator(data.fields[name].type);
            field.loadData(data.fields[name]);
            this.fields[name] = field;
        }
    }
    
    public build():void
    {
        this.$template.empty();
        for(let name in this.fields){
            this.template.append(this.fields[name].template);
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
    }

}