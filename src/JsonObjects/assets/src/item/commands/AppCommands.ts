import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {TComposite} from '../types/TComposite';
import {TAbstractObject} from '../types/TAbstractObject';
import {EInputTypes} from '../types/EInputTypes';
import {TValueObject} from '../types/TValueObject';
import {TObjectsArray} from '../types/TObjectsArray';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppCommands implements IAppCommands {

    public editObject(key:string, composite:TComposite):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('id', settings.item.id);
            formData.append('key', key);
            this.fillFormData(composite, formData, 'object');

            $.ajax({
                url: settings.editObjUrl,
                data: formData,
                type: 'POST',
                dataType: 'json',
                processData : false,
                contentType : false,
                success: (resp:any) => {
                    resolve(resp);
                },
                error: (e:JQueryXHR) => {
                    reject(e.responseJSON);
                }
            });
        });
    }
    
    protected fillFormData(obj:TAbstractObject, formData:FormData, name:string)
    {
        if(obj.type == EInputTypes.composite){
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
            }
            return;
        }
        formData.append(name + '[value]', (<TValueObject>obj).value);
    }

}