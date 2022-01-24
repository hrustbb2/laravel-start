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

    public newItem(dirId:string, type:string, name:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            resolve({
                success: true,
                errors: [],
                item: {
                    id: 'qwe',
                    name: name,
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

    public renameItem(itemId:string, name:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            resolve({
                success:true,
                errors:[],
                item: {
                    id:itemId,
                    name: name,
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

    public deleteItem(itemId:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            resolve({
                success: true,
                errors: [],
            });
        });
    }

}