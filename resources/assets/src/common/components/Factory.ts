import {IFactory} from '../interfaces/components/IFactory';
import {IFactory as ICommonFactory} from '../interfaces/IFactory';

export class Factory implements IFactory {

    protected commonFactory:ICommonFactory;

    public setCommonFactory(factory:ICommonFactory)
    {
        this.commonFactory = factory;
    }

}