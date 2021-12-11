import {IDir} from './IDir';
import {IToolsPanel} from './IToolsPanel';
import * as types from '../../types';

export interface IAppContainer {
    setToolsPanel(toolsPanel:IToolsPanel):void;
    init(container:JQuery):void;
    setDirCreator(callback:()=>IDir):void;
    loadDirs(dirsData:types.TDirs):void;
    appendDir(dirData:types.TDir):void;
    renameDir(dirData:types.TDir):void;
    deleteDir(dirData:types.TDir):void;
}