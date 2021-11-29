export interface IAppCommands {
    newDir(parentDir:string, name:string):Promise<any>;
}