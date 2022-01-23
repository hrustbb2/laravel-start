import {IObjectForm} from '../interfaces/components/IObjectForm';
import {TAbstractObject} from '../types/TAbstractObject';
import {TComposite} from '../types/TComposite';
import {IComposite} from '../interfaces/components/IComposite';
import {EInputTypes} from '../types/EInputTypes';
import {TObjectsArray} from '../types/TObjectsArray';
import {TValueObject} from '../types/TValueObject';

export class ObjectForm implements IObjectForm {

    protected $container:JQuery;

    protected stack:TAbstractObject[] = [];

    protected compositeCreator:()=>IComposite;

    protected key:string;

    public setCompositeCreator(callback:()=>IComposite)
    {
        this.compositeCreator = callback;
    }

    public setKey(key:string)
    {
        this.key = key;
    }

    public init(container:JQuery)
    {
        this.$container = container;

    }

    public getData():TAbstractObject
    {
        return this.stack[0];
    }

    public render(composite:TComposite):Promise<TComposite>
    {
        this.stack.push(composite);
        let c = this.compositeCreator();
        c.setFormKey(this.key);
        c.loadData(composite);
        let promise = c.build();
        this.$container.empty();
        this.$container.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
        return promise;
    }

    public rerender()
    {
        let composite = this.stack[this.stack.length - 1];
        let c = this.compositeCreator();
        c.setFormKey(this.key);
        c.loadData(composite);
        c.build();
        this.$container.empty();
        this.$container.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
    }

    public back()
    {
        this.stack.pop();
        let composite = this.stack[this.stack.length - 1];
        let c = this.compositeCreator();
        c.setFormKey(this.key);
        c.loadData(composite);
        c.build();
        this.$container.empty();
        this.$container.append(c.template);
        c.eventsListen();
        if(this.stack.length > 1){
            c.showBackButton();
            c.showSaveButton();
        }
    }

    public getFormData():FormData
    {
        let formData = new FormData();
        this.fillFormData(this.getData(), formData, 'object');
        return formData;
    }

    protected fillFormData(obj:TAbstractObject, formData:FormData, name:string)
    {
        if(obj.composite){
            for(let field in (<TComposite>obj).fields){
                let n = name + '[' + field + ']';
                this.fillFormData((<TComposite>obj).fields[field], formData, n);
            }
            return;
        }
        if(obj.type == EInputTypes.array){
            for(let i in (<TObjectsArray>obj).items){
                let n = name + '[items][' + i + ']';
                this.fillFormData((<TObjectsArray>obj).items[i], formData, n);
                formData.append(name + '[items][' + i + '][type]', (<TObjectsArray>obj).items[i].type);
            }
            return;
        }
        formData.append(name + '[value]', (<TValueObject>obj).value);
    }

}