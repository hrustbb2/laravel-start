import 'jquery';
import {Button} from './Button';

$(()=>{
    $('.js-editable-block').each((i:number, el:HTMLElement)=>{
        let button = new Button();
        let href = $(el).attr('edit-url');
        button.href = href;
        button.template.insertAfter($(el));
        button.eventsListen();
        $(el).on('mousemove', (e:any)=>{
            if (e.ctrlKey) {
                button.template.css('opacity', 1);
                let x = e.pageX;
                let y = e.pageY;
                button.template.css({
                    top: y,
                    left: x
                });
            }
        });
    }); 
});