(function($){
    
    // camel case
    
    var burger = $('#burger');
        burger.on('click',function(){
        $('.liens').slideToggle();
        console.log('hello');
    });

})(jQuery);




