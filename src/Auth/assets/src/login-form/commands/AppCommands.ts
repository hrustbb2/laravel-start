import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppCommands implements IAppCommands {

    public login(email:string, password:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('email', email);
            formData.append('password', password);

            $.ajax({
                url: settings.requestUrl,
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

}