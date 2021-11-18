import 'jquery';
import {Factory} from './Factory';

$(()=>{
    let factory = new Factory();
    let container = $('.js-content-container');
    factory.init(container);
});