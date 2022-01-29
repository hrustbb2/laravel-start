import {IFactory as IComponentsFactory} from '../interfaces/components/IFactory';

export interface IFactory {
    getComponentsFactory():IComponentsFactory;
}