const swup = new Swup({
  plugins: [new SwupSlideTheme()]
});

tinymce.init({selector:'textarea'});

swup.on('contentReplaced', () => {
  tinymce.init({selector:'textarea'});
});


