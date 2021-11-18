import {IAppCommands} from './IAppCommands';

export interface IFactory {
    getAppCommands():IAppCommands;
}