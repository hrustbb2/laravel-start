import {IFactory} from '../../interfaces/components/file-input/IFactory';
import {IFactory as IComponentsFactory} from '../../interfaces/components/IFactory';
import {IFileInput} from '../../interfaces/components/file-input/IFileInput';
import {FileInput} from './FileInput';
import {IBrowserModal} from '../../interfaces/components/file-input/IBrowserModal';
import {BrowserModal} from './BrowserModal';
import {IItem} from '../../interfaces/components/file-input/IItem';
import {Item} from './Item';

export class Factory implements IFactory {

    protected componentsFactory:IComponentsFactory;

    protected browserModal:IBrowserModal = null;

    public setComponentsFactory(factory:IComponentsFactory)
    {
        this.componentsFactory = factory;
    }

    public createFileInput():IFileInput
    {
        let fileInput = new FileInput();
        let bus = this.componentsFactory.getAppFactory().getBusFactory().getFileInputBus();
        fileInput.setBus(bus);
        return fileInput;
    }

    public getBrowserModal():IBrowserModal
    {
        if(this.browserModal === null){
            this.browserModal = new BrowserModal();
            this.browserModal.setItemCreator(()=>{
                return this.createItem();
            });
            let commands = this.componentsFactory.getAppFactory().getCommandsFactory().getFilesBrowserCommands();
            this.browserModal.setFilesBrowserCommands(commands);
            $('body').append(this.browserModal.template);
            this.browserModal.eventsListen();
        }
        return this.browserModal;
    }

    protected createItem():IItem
    {
        let item = new Item();
        let commands = this.componentsFactory.getAppFactory().getCommandsFactory().getFilesBrowserCommands();
        item.setFBCommands(commands);
        let bus = this.componentsFactory.getAppFactory().getBusFactory().getFileInputBus();
        item.setFBBus(bus);
        return item;
    }

}