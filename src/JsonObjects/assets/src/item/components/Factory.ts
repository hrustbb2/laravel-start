import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as IAppFactory} from '../interfaces/IFactory';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import {EInputTypes} from '../types/EInputTypes';
import {IAppContainer} from '../interfaces/components/IAppContainer';
import {AppContainer} from './AppContainer';
import {IModal} from '../interfaces/components/IModal';
import {Modal} from './Modal';
import {Composite} from './Composite';
import {ObjectForm} from './ObjectForm';
import {IObjectForm} from '../interfaces/components/IObjectForm';
import {String} from './String';
import {Text} from './Text';
import {ObjectsArray} from './ObjectsArray';
import {ArrayItem} from './ArrayItem';

type TObjectForms = {
    [key:string]:IObjectForm;
}

export class Factory implements IFactory {
    
    protected appFactory:IAppFactory;

    protected appContainer:IAppContainer = null;

    protected modal:IModal = null;

    protected objectForms:TObjectForms = {};

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
        let objectBus = this.appFactory.getBusFactory().getObjectBus();
        this.appContainer.setObjectBus(objectBus);
        let objForm = this.getObjectForm('obj-form-key');
        this.appContainer.setObjectForm(objForm);
        this.appContainer.init(container);
    }

    public createInputField(type:EInputTypes):IAbstractObject
    {
        let objectBus = this.appFactory.getBusFactory().getObjectBus();
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
            input.setObjectBus(objectBus);
            input.setItemCreator(()=>{
                let item = new ArrayItem();
                let objectBus = this.appFactory.getBusFactory().getObjectBus();
                item.setObjectBus(objectBus);
                return item;
            });
            return input;
        }
        let input = this.createComposite();
        return input;
    }

    protected createComposite()
    {
        let objectBus = this.appFactory.getBusFactory().getObjectBus();
        let composite = new Composite();
        composite.setObjectBus(objectBus);
        composite.setFieldCreator((type:EInputTypes)=>{
            return this.createInputField(type);
        });
        return composite;
    }

    public getObjectForm(key:string):IObjectForm
    {
        if(!this.objectForms[key]){
            let objectForm = new ObjectForm();
            objectForm.setKey(key);
            objectForm.setCompositeCreator(()=>{
                return this.createComposite();
            });
            this.objectForms[key] = objectForm;
        }
        return this.objectForms[key];
    }

}