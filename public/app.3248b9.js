"use strict";(self.webpackChunksage=self.webpackChunksage||[]).push([[143],{220:function(e,t,n){var o=n(194),i=n(697),c=n.n(i),s=n(669),r=n.n(s),a=n(837),d=n(622);a.Z.registerLanguage("javascript",d.Z),a.Z.highlightAll();const l=n(630),u=async e=>{e&&console.error(e),(new l).init();let t=document.getElementById("header");t&&new(c())(t,{customBreakPoint:!0,breakPointValue:150});const n=document.querySelector(".btn-like");n&&n.addEventListener("click",(function(e){let t=e.target,o=JSON.parse(localStorage.getItem("liked_posts")),i=parseInt(t.dataset.postid);if(Array.isArray(o)&&-1!==o.indexOf(i))return n.classList.add("liked"),!1;Array.isArray(o)||(o=[]);let c=t.dataset.url,s=new FormData;s.append("action","like_post"),s.append("post_id",i),r().post(c,s,{headers:{"Content-Type":"multipart/form-data"}}).then((e=>{e.status&&(document.querySelector("#post-likes-number").innerHTML=e.data,o.push(i),localStorage.setItem("liked_posts",JSON.stringify(o)),t.classList.add("liked"))}))}));const o=document.querySelector(".mobile-menu");if(o){o.addEventListener("click",(()=>{const e=document.querySelector(".nav-primary");e&&(e.classList.toggle("hidden"),e.classList.add("mobile-nav"))}));let e=document.querySelector(".nav-primary");e&&e.addEventListener("click",(()=>{e.classList.add("hidden")}))}!function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};const{id:t="back-to-top",onClickScrollTo:n=0,scrollContainer:o=document.body,scrollDuration:i=100}=e;let c=o===document.body?window:o;const s=o===document.body&&document.documentElement,r=document.querySelector("#"+t);function a(){h()>30?f():p()}function d(e,t,n){var o,i=new Date;return function(){var c=this,s=arguments,r=new Date;clearTimeout(o),r-i>=n?(e.apply(c,s),i=r):o=setTimeout(e,t)}}function l(){const e="function"==typeof n?n():n,{performance:t,requestAnimationFrame:o}=window;if(i<=0||void 0===t||void 0===o)return m(e);const c=t.now(),s=h(),r=s-e;o((function e(t){const n=Math.min((t-c)/i,1);m(s-Math.round(u(n)*r)),n<1&&o(e)}))}function u(e){return.5*(1-Math.cos(Math.PI*e))}function m(e){o.scrollTop=e,s&&(document.documentElement.scrollTop=e)}function p(){r.classList.contains("hidden")||r.classList.add("hidden")}function f(){r.classList.contains("hidden")&&r.classList.remove("hidden")}function h(){return o.scrollTop||s&&document.documentElement.scrollTop||0}c.addEventListener("scroll",d(a,200,400)),a(),r.addEventListener("click",(e=>{e.preventDefault(),l()}))}()};(0,o.domReady)(u)},402:function(){}},function(e){var t=function(t){return e(e.s=t)};e.O(0,[329],(function(){return t(220),t(402)})),e.O()}]);