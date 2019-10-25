
/* eslint-env es6 */
/* eslint indent: ['warn', 2] */
/* global jQuery */

/** News module loaded on news page.
 * Downloads new post on scroll.
 * Insert them in order of retrieval not
 * in order of downloading.
 *
 * Push article in an ordered set by parution date.
 * unload article if displayed.
 *
 * **Warning**: If a more complexe solution is needed think about using a
 * React component for a bidirectionnal scroll with limited
 * memory usage.
 * This solution can eat up a lot of RAM because it keeps
 * all the attached element to ram.
 * A better solution is to implement a bi-directionnal scroll
 * with something like React.
 */
const news = (() => {
  /** Shared boolean to restrain scrolling if content is not already
   * loaded.
   * @type {boolean}
   */
  let waitContentLoaded = false;

  /**
   * Get news by an ajax call.
   * @param {number} pageNumber
   */
  function loadArticle(pageNumber) {
    // Note: the action query variable must match
    // the scring defined in the wordpress `add_action` ajax hook.
    const action = 'news';
    const newsList = jQuery('#news-list');
    const liNewsList = jQuery('li#news-list');
    newsList.show('fast');
    jQuery.ajax({
      url: `${window.admin_url}admin-ajax.php?action=${action}&page=${pageNumber}`,
      type: 'GET',

      /**
       * In case of success append loaded content to Document Object Model
       * and reset `waitcontentLoaded` to false.
       * @param {Object} resp
       * @global `waitContentLoaded`
       */
      success(resp) {
        const { html } = resp.data;
        liNewsList.hide('1000');
        newsList.append(html);
        waitContentLoaded = false;
      },

      /** In case of failure reset
       * `waitContentLoaded` to false.
       * @global `waitContentLoaded`
       */
      fail() {
        waitContentLoaded = false;
      },
    });
    return false;
  }

  jQuery(document).ready(() => {
    // Execute this script only on /news page or /en/news.
    if ((window.location.pathname !== '/news/'
      && window.location.pathname !== '/en/news/')) {
      return;
    }

    /** Variable updated by `handleScroll` function
     * @type {number}
     */
    let pageCounter = window.pageOffset + 1;

    /** Manage scroll event
     * Do nothing if `waitContentLoaded` module global is `true`,
     * of if the scroll do not reach the bottom.
     *
     * @globals `waitContentLoaded`, `document`, `window`, `window.total`.
     * @returns {boolean} if event is cancelled return false.
     */
    const handleScroll = () => {
      // @globals `waitContentLoaded` is set to true in `loadArticles`.
      if (waitContentLoaded) {
        return false;
      }

      const docHeight = jQuery(document).height();
      const windowHeight = jQuery(window).height();
      if (jQuery(window).scrollTop() < docHeight - windowHeight - 5) {
        return false;
      }

      if (pageCounter > window.total) {
        return false;
      } else {
        // Let's wait contentLoading.
        waitContentLoaded = true;
        loadArticle(pageCounter);
        pageCounter += 1;
        return true;
      }
    };
    jQuery(window).scroll(handleScroll);

    $(window).load(() => {
      $('.bloc_text_news').each((_, elem) => {
        if ($(elem).height() > $(elem).parent().height()) {
          $(elem).parent().next().removeClass('hide');
        }
      });
    });
  });
})();
