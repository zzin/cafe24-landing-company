import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/all';
gsap.registerPlugin(ScrollTrigger);

const InitBanner = () => {
  const init = () => {
    const figureBanner = document.querySelector('.figure-banner');
    if (figureBanner) {
      const tl = gsap.timeline();
      tl.to(figureBanner, {
        duration: 2,
        clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
        scrollTrigger: {
          trigger: figureBanner,
          start: 'top 90%',
          end: 'top 50%',
          scrub: 1.35,
        },
      });
      setTimeout(() => {
        scrollRefresh();
      }, 2000);
    }

    const scrollRefresh = () => {
      ScrollTrigger.refresh();
    };

    function debounce(func) {
      let timer;
      return function (event) {
        if (timer) clearTimeout(timer);
        timer = setTimeout(
          () => {
            func();
          },
          2000,
          event
        );
      };
    }
    window.addEventListener('resize', debounce(scrollRefresh));
  };
  document.addEventListener('DOMContentLoaded', () => {
    init();
  });
};
export default InitBanner;
