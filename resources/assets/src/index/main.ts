import 'jquery';
import {Factory} from './Factory';

$(()=>{
    let factory = new Factory();
    factory.getComponentsFactory().pageInit();
});