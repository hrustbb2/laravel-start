import {Factory as AdminPanelFactory} from '@common/admin/Factory';
import 'jquery';

$(()=>{
    let adminPanelFactory = new AdminPanelFactory();
    adminPanelFactory.initAdminPanel();
});