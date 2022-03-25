let goTop = function (params = {}) {
  const {
    //cornerOffset = 20, 
    //diameter = 56,
    id = 'back-to-top',
    onClickScrollTo = 0, // px, or a function returning number
    scrollContainer = document.body,
    scrollDuration = 100, // ms
  } = params;
  let scrollEmitter = (scrollContainer === document.body) ? window : scrollContainer

  const scrollDocumentElement = (scrollContainer === document.body) && document.documentElement

  const goTopBtn = document.querySelector('#' + id)

  scrollEmitter.addEventListener('scroll', throttle(adapt, 200, 400))
  adapt()

  function adapt() {
    if (getScrollTop() > 30) {
      show();
    } else {
      hide();
    }
  }

  function throttle(func, wait, mustRun) {
    var timeout,
      startTime = new Date();

    return function () {
      var context = this,
        args = arguments,
        curTime = new Date();

      clearTimeout(timeout);
      if (curTime - startTime >= mustRun) {
        func.apply(context, args);
        startTime = curTime;
      } else {
        timeout = setTimeout(func, wait);
      }
    }
  }

  goTopBtn.addEventListener('click', event => {
    event.preventDefault()
    scrollUp()
  })

  function scrollUp () {
    const scrollTo = typeof onClickScrollTo === 'function' ? onClickScrollTo() : onClickScrollTo
    const { performance, requestAnimationFrame } = window
    if (scrollDuration <= 0 || typeof performance === 'undefined' || typeof requestAnimationFrame === 'undefined') {
      return setScrollTop(scrollTo)
    }
    const start = performance.now()
    const initScrollTop = getScrollTop()
    const pxsToScrollBy = initScrollTop - scrollTo

    requestAnimationFrame(step)

    function step (timestamp) {
      const progress = Math.min((timestamp - start) / scrollDuration, 1)
      setScrollTop(initScrollTop - Math.round(inOutSine(progress) * pxsToScrollBy))
      if (progress < 1) { requestAnimationFrame(step) }
    }
  }

  function inOutSine (n) {
    return 0.5 * (1 - Math.cos(Math.PI * n))
  }

  function setScrollTop (value) {
    scrollContainer.scrollTop = value
    if (scrollDocumentElement) {
      document.documentElement.scrollTop = value
    }
  }

  function hide() {
    if (! goTopBtn.classList.contains('hidden')) {
      goTopBtn.classList.add('hidden')
    }
   }
  function show() {
    if (goTopBtn.classList.contains('hidden')) {
      goTopBtn.classList.remove('hidden')
    }
  }

  function getScrollTop() {
    return scrollContainer.scrollTop || (scrollDocumentElement && document.documentElement.scrollTop || 0)
  }
}

export default goTop;