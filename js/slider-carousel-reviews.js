$(document).ready(function(){
    var owl = $('.reviews__carousel');
    owl.owlCarousel({
        touchDrag:true,
        // nav: true,
        autoWidth:true,
        navText: [ //стрелки навигации
            '<div class="reviews__arrows-prev"></div>',
            '<div class="reviews__arrows-next"></div>'
        ],
        navContainer: '.reviews__arrows ',
        responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
            0:{
                items:1
            },
            750:{
                items:2
            }
        }

    });
});