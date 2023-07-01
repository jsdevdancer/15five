import $ from 'jquery';

const ajaxCardsLoadMore = () => {
  const button = document.querySelector('.content-cards #content-load-more');

  if (typeof button !== 'undefined' && button != null) {
    button.addEventListener('click', (e) => {
      e.preventDefault();

      const postsList = document.querySelector('.content-cards .cards-wrapper');
      const nextPage = parseInt(postsList.dataset.page, 10) + 1;
      const postsPerPage = postsList.dataset.posts_per_page;
      const maxPages = postsList.dataset.max;
      const taxonomyType = postsList.dataset.taxonomy_type;
      const { taxonomy } = postsList.dataset;

      const params = new URLSearchParams();
      params.append('action', 'load_more_content_cards_posts');
      params.append('page', nextPage);
      params.append('posts_per_page', postsPerPage);
      params.append('max_pages', maxPages);
      params.append('taxonomy_type', taxonomyType);
      params.append('taxonomy', taxonomy);

      const settings = {
        type: 'POST',
        processData: false,
        url: window.FlyntData.ajaxurl,
        data: params,
        success(res) {
          if (typeof res === 'object') {
            $.each(res, (i, post) => {
              postsList.insertAdjacentHTML('beforeend', post.data);
            });

            postsList.dataset.page++;

            if (postsList.dataset.page === postsList.dataset.max) {
              button.parentNode.removeChild(button);
            }
          }
        },
      };

      $.ajax(settings);
    });
  }
};

ajaxCardsLoadMore();
