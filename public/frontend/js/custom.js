$(document).ready(function () {
    $('.carousel').each(function(){

        // find carousel
        $(this).carousel();

        var carousel = $(this).data('bs.carousel');

        // pause the cycle
        carousel.pause();

        // At first, reverse the order of the items in the carousel because we're moving backwards
        $(this).find('> .carousel-inner > .item:not(:first-child)').each(function() {
            $(this).prependTo(this.parentNode);
        });

        // Override the bootstrap carousel prototype function, adding a different one won't work
        carousel.cycle = function (e) {
            if (!e) this.paused = false
            if (this.interval) clearInterval(this.interval);
            this.options.interval
            && !this.paused
            && (this.interval = setInterval($.proxy(this.prev, this), this.options.interval))
            return this;
        };

        // begin the cycle again
        carousel.cycle();
    });
});