// لتنسيق رسالة التنبيهات القادمة مع الراوت 
// رسالة التنبيهات موجودة في الملف
// views/partial/backend/flash.blade.php
// هذا الكود يقوم باستدعاء الاليرت ثم اعمل لها فيد تو بعد خمس ثواني 
// واعمل لها سلايد اب بسرعة نص ثانية
$(function(){
    $("#alert-message").fadeTo(5000,500).slideUp(500,function(){
        $("#alert-message").slideUp(500);
    })
});


// for pagination setting 
(function($) {
    $('ul.pagination li.active')
        .prev().addClass('show-mobile')
        .prev().addClass('show-mobile');
    $('ul.pagination li.active')
        .next().addClass('show-mobile')
        .next().addClass('show-mobile');
    $('ul.pagination')
        .find('li:first-child, li:last-child, li.active')
        .addClass('show-mobile');
})(jQuery);