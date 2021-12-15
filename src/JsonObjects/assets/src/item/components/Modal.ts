import {IModal} from '../interfaces/components/IModal';
import {TAbstractObject} from '../types/TAbstractObject';
import {EInputTypes} from '../types/EInputTypes';
import {IAbstractObject} from '../interfaces/components/IAbstractObject';
import 'bootstrap';

export class Modal implements IModal {

    protected html:string = `
        <div class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body js-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    protected $template:JQuery;

    protected $body:JQuery;

    protected objCreator:(type:EInputTypes)=>IAbstractObject;

    public constructor()
    {
        this.$template = $(this.html);
        this.$body = this.template.find('.js-body');
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public setObjCreator(callback:(type:EInputTypes)=>IAbstractObject)
    {
        this.objCreator = callback;
    }

    public show(obj:TAbstractObject)
    {
        let inputObj = this.objCreator(obj.type);
        inputObj.loadData(obj);
        this.$body.empty();
        this.$body.append(inputObj.template);
        (<any>this.$template).modal('show');
    }

    public hide()
    {
        (<any>this.$template).modal('hide');
    }

}