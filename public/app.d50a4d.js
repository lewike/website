"use strict";(self.webpackChunksage=self.webpackChunksage||[]).push([[143],{220:function(t,e,n){var o=n(194),c=n(697),i=n.n(c),s=n(669),r=n.n(s),a=n(837),l=n(622);a.Z.registerLanguage("javascript",l.Z),a.Z.highlightAll();const d=n(630),u=async t=>{t&&console.error(t),(new d).init();let e=document.getElementById("header");e&&new(i())(e,{customBreakPoint:!0,breakPointValue:150});const n=document.querySelector(".btn-like");n&&n.addEventListener("click",(function(t){let e=t.target,n=JSON.parse(localStorage.getItem("liked_posts")),o=parseInt(e.dataset.postid);if(Array.isArray(n)&&-1!==n.indexOf(o))return e.classList.add("liked"),!1;n=[];let c=e.dataset.url,i=new FormData;i.append("action","like_post"),i.append("post_id",o),r().post(c,i).then((t=>{t.status&&(document.querySelector("#post-likes-number").innerHTML=t.data,n.push(o),localStorage.setItem("liked_posts",JSON.stringify(n)),e.classList.add("liked"))}))})),function(){let t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};const{id:e="back-to-top",onClickScrollTo:n=0,scrollContainer:o=document.body,scrollDuration:c=100}=t;let i=o===document.body?window:o;const s=o===document.body&&document.documentElement,r=document.querySelector("#"+e);function a(){h()>30?f():p()}function l(t,e,n){var o,c=new Date;return function(){var i=this,s=arguments,r=new Date;clearTimeout(o),r-c>=n?(t.apply(i,s),c=r):o=setTimeout(t,e)}}function d(){const t="function"==typeof n?n():n,{performance:e,requestAnimationFrame:o}=window;if(c<=0||void 0===e||void 0===o)return m(t);const i=e.now(),s=h(),r=s-t;o((function t(e){const n=Math.min((e-i)/c,1);m(s-Math.round(u(n)*r)),n<1&&o(t)}))}function u(t){return.5*(1-Math.cos(Math.PI*t))}function m(t){o.scrollTop=t,s&&(document.documentElement.scrollTop=t)}function p(){r.classList.contains("hidden")||r.classList.add("hidden")}function f(){r.classList.contains("hidden")&&r.classList.remove("hidden")}function h(){return o.scrollTop||s&&document.documentElement.scrollTop||0}i.addEventListener("scroll",l(a,200,400)),a(),r.addEventListener("click",(t=>{t.preventDefault(),d()}))}()};(0,o.domReady)(u)},402:function(){}},function(t){var e=function(e){return t(t.s=e)};t.O(0,[329],(function(){return e(220),e(402)})),t.O()}]);