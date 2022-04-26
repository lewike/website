import {domReady} from '@roots/sage/client';
import StickyNav from 'stickynav-js';
import axios from 'axios';
import goTop from './scroll';
import hljs from 'highlight.js/lib/core';
import javascript from 'highlight.js/lib/languages/javascript';

hljs.registerLanguage('javascript', javascript);
hljs.highlightAll();
const WoW = require('wow.js');

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  new WoW().init();

  let menu = document.getElementById('header')
  if (menu) {
    new StickyNav(menu, {
      customBreakPoint: true,
      breakPointValue: 150,
    });
  }

  const btnLike = document.querySelector('.btn-like');
  if (btnLike) {
    btnLike.addEventListener('click', function (event){
      let buttonEle = event.target;
      let posts = JSON.parse(localStorage.getItem('liked_posts'));
      let postId = parseInt(buttonEle.dataset.postid);
       if (Array.isArray(posts) && posts.indexOf(postId) !== -1) {
        btnLike.classList.add('liked');
        return false;
      }
      
      if (!Array.isArray(posts)) {
        posts = [];
      }
      
      let url = buttonEle.dataset.url;
      let formData = new FormData();
      formData.append('action', 'like_post');
      formData.append('post_id', postId);
      axios.post(url, formData, {headers: {'Content-Type': 'multipart/form-data'}})
        .then(response => {
          if (response.status) {
            const postLikesEle = document.querySelector('#post-likes-number');
            postLikesEle.innerHTML = response.data;
            posts.push(postId);
            localStorage.setItem('liked_posts', JSON.stringify(posts));
            buttonEle.classList.add('liked');
          }  
        })
    })
  }
  
  goTop();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
