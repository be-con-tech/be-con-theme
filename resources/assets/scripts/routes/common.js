export default {
  init() {
    // JavaScript to be fired on all pages
    $('input[type="submit"]').wrap("<div class='button-wrapper'></div>");
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
