export default {
  init() {
    // JavaScript to be fired on all pages
    
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('input[type="submit"]').each(function() {
      if ($(this).parents('#wpadminbar').length === 0) {
        $(this).wrap("<div class='button-wrapper'></div>");
      }
    });
  },
};
