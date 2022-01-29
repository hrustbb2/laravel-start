import {IFactory as IComponentsFactory} from './components/IFactory';

export interface IFactory {
    getComponentsFactory():IComponentsFactory;
}