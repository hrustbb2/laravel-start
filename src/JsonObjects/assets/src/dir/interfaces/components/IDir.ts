import {TDir} from '../../types/TDir';
import {IAppBus} from '../bus/IAppBus';

export interface IDir {
    template:JQuery;
    setAppBus(bus:IAppBus):void;
    eventsListen():void;
    load(data:TDir):void;
}