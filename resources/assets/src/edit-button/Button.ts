export class Button {

    protected html:string = `
        <div class="edit-block-btn">
            <a href="" target="_blank">Edit</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill js-close-btn" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
        </div>
    `;

    protected $template:JQuery;

    protected $closeBtn:JQuery;

    protected $href:JQuery;

    public constructor()
    {
        this.$template = $(this.html);
        this.$closeBtn = this.template.find('.js-close-btn');
        this.$href = this.$template.find('a');
    }

    get template():JQuery
    {
        return this.$template;
    }

    set href(href:string)
    {
        this.$href.attr('href', href);
    }

    public eventsListen()
    {
        this.$closeBtn.on('click', ()=>{
            this.$template.css('opacity', 0);
        });
    }

}