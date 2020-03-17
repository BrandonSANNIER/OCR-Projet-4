class SlidRoman {
    constructor() {
        this.nbRoman = $('.list').length;
        this.current = 0;
        this.initSettings();
    };

    initSettings() {

        $('#next').on("click", () => {
            this.next();
            console.log("test");
        });
        $('#prev').on("click", () => {
            this.prev();
        });

    };

    next() {

        this.current++;

        if ((this).current > this.nbRoman) {

            this.current = 0;

        } else {
            
        }
    };

    prev() {

        this.current--;

        if (this.current < 0) {

            this.current = this.nbRoman - 1;
        }
    };
}