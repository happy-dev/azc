'use strict';

/**
 * Get news by an ajax call.
 * Warning: This solution can eat up a lot of RAM because it keeps
 * all the attached element to ram.
 * A better solution is to implement a bi-directionnal scroll
 * with something like React.
 * 
 * @param {number} pageNumber
 */
function loadArticle(pageNumber) {
  // Note: the action query variable must match
  // the scring defined in the wordpress `add_action` ajax hook.
  const action = 'news';
  jQuery('#news-list').show('fast');
  jQuery.ajax({
    url: `${window.admin_url}admin-ajax.php?action=${action}&page=${pageNumber}`,
    type: 'GET',
    success(resp) {
      const { html } = resp.data;
      jQuery('li#news-list').hide('1000');
      jQuery('#news-list').append(html);
    }
  });
  return false;
}

jQuery(document).ready(($) => {
  let count = window.pageOffset;

  $(window).scroll(() => {
    const docHeight = $(document).height();
    const windowHeight = $(window).height();
    if ($(window).scrollTop() >= docHeight - windowHeight - 10) {
      if (count > window.total) {
        return false;
      } else {
        loadArticle(count);
      }
      count += 1;
    }
  });
});