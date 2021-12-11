export interface IAppCommands {
    newDir(parentDir:string, name:string):Promise<any>;
    renameDir(dirId:string, name:string):Promise<any>;
    deleteDir(dirId:string):Promise<any>;
}