import {IContextMenu} from '../interfaces/components/IContextMenu';

export class ContextMenu implements IContextMenu {

    protected html:string = `
        <div class="context-menu">
            <div class="context-menu-item">
                Item 1
            </div>
            <div class="context-menu-item">
                Item 2
            </div>
            <div class="context-menu-item">
                Item 3
            </div>
        </div>
    `;

    protected $template:JQuery;

    public constructor()
    {
        this.$template = $(this.html);
    }

    public get template():JQuery
    {
        return this.$template;
    }

    public show(x:number, y:number)
    {
        this.$template.css({top: y, left: x});
        this.$template.show();
    }

    public hide()
    {
        this.$template.hide();
    }

}