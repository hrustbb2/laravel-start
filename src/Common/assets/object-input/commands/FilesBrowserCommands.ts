import {IFilesBrowserCommands} from '../interfaces/commands/IFilesBrowserCommands';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class FilesBrowserCommands implements IFilesBrowserCommands {

    public getDir(path:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('path', path);
            
            $.ajax({
                url: settings.fileInputSettings.getDirUrl,
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