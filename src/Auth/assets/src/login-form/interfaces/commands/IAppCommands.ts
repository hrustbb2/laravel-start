export interface IAppCommands {
    login(email:string, password:string):Promise<any>;
}