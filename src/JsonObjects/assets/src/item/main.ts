import {Factory as AdminPanelFactory} from '@common/admin/Factory';
import {Factory} from './Factory';
import 'jquery';

$(()=>{
    let adminPanelFactory = new AdminPanelFactory();
    adminPanelFactory.initAdminPanel();
    let factory = new Factory();
    factory.init($('.js-app-container'));
});