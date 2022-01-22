import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import {EInputTypes} from '../types/EInputTypes';
import {IAppContainer} from '../interfaces/components/IAppContainer';
import {AppContainer} from './AppContainer';
import {IModal} from '../interfaces/components/IModal';
import {Modal} from './Modal';
import {Composite} from './Composite';
import {String} from './String';
import {Text} from './Text';
import {ObjectsArray} from './ObjectsArray';
import {ArrayItem} from './ArrayItem';

export class Factory implements IFactory {
    
    protected appFactory:IAppFactory;

    protected appContainer:IAppContainer = null;

    protected modal:IModal = null;

    public setAppFactory(factory:IAppFactory)
    {
        this.appFactory = factory;
    }

    public getAppContainer():IAppContainer
    {
        return this.appContainer;
    }

    public getModal():IModal
    {
        if(this.modal === null){
            this.modal = new Modal();
            this.modal.setObjCreator((type:EInputTypes)=>{
                return this.createInputField(type);
            });
            $('body').append(this.modal.template);
            this.modal.eventsListen();
        }
        return this.modal;
    }

    public init(container:JQuery)
    {
        this.appContainer = new AppContainer();
        this.appContainer.setCompositeCreator(()=>{
            return this.createComposite();
        });
        let appCommands = this.appFactory.getCommandsFactory().getAppCommands();
        this.appContainer.setAppCommands(appCommands);
        this.appContainer.init(container);
    }

    public createInputField(type:EInputTypes):IAbstractObject
    {
        let appBus = this.appFactory.getBusFactory().getAppBus();
        if(type == EInputTypes.string){
            let input = new String();
            return input;
        }
        if(type == EInputTypes.text){
            let input = new Text();
            return input;
        }
        if(type == EInputTypes.array){
            let input = new ObjectsArray();
            input.setAppBus(appBus);
            input.setItemCreator(()=>{
                let item = new ArrayItem();
                let appBus = this.appFactory.getBusFactory().getAppBus();
                item.setAppBus(appBus);
                return item;
            });
            return input;
        }
        let input = this.createComposite();
        return input;
    }

    protected createComposite()
    {
        let appBus = this.appFactory.getBusFactory().getAppBus();
        let composite = new Composite();
        composite.setAppBus(appBus);
        composite.setFieldCreator((type:EInputTypes)=>{
            return this.createInputField(type);
        });
        return composite;
    }

}