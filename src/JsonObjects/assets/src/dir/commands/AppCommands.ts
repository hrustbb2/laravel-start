import {IAppCommands} from '../interfaces/commands/IAppCommands';
import {TSettings} from '../types/TSettings';

declare let settings:TSettings;

export class AppCommands implements IAppCommands {

    public newDir(parentDir:string, name:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('parent-dir', parentDir);
            formData.append('name', name);

            $.ajax({
                url: settings.newDirUrl,
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

    public renameDir(dirId:string, name:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('id', dirId);
            formData.append('name', name);

            $.ajax({
                url: settings.renameDirUrl,
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

    public deleteDir(dirId:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('id', dirId);

            $.ajax({
                url: settings.deleteDirUrl,
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