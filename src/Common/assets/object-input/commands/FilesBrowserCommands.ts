import {IFilesBrowserCommands} from '../interfaces/commands/IFilesBrowserCommands';

export class FilesBrowserCommands implements IFilesBrowserCommands {

    public getDir(path:string):Promise<any>
    {
        return new Promise<any>((resolve:any, reject:any)=>{
            resolve({
                dirs:[
                    'dir1',
                    'dir2',
                ],
                files:[
                    'file1',
                    'file2',
                ]
            });
        });
    }

}