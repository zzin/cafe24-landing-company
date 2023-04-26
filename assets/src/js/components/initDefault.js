import AOS from 'aos';
import gsap from 'gsap';
import { ScrollToPlugin } from 'gsap/all';
gsap.registerPlugin(ScrollToPlugin);

const InitDefault = () => {
  const initGlobal = () => {
    const mediaQueryList = window.matchMedia('(max-width: 1024px)');
    const handleSizeChange = (mql) => {
      if (mql.matches) {
        // mobile size
        document.documentElement.classList.add('size-mobile');
        document.documentElement.classList.remove('size-pc');
      } else {
        // pc size
        document.documentElement.classList.add('size-pc');
        document.documentElement.classList.remove('size-mobile');
      }
    };
    handleSizeChange(window.matchMedia('(max-width: 1024px)'));
    mediaQueryList.addEventListener('change', handleSizeChange);
  };
  const initQuickGo = () => {
    gsap.utils.toArray('#primary-menu .menu-item a').forEach((link) => {
      const target = link.getAttribute('href');
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const heightValue = document.documentElement.classList.contains(
          'size-pc'
        )
          ? 72
          : 52;
        gsap.to(window, {
          duration: 0.8,
          scrollTo: {
            y: target,
            offsetY: heightValue,
          },
          ease: 'power3.out',
        });
      });
    });
  };
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
      offset: 50,
      duration: 800,
      ease: 'ease-in-sine',
    });
    initQuickGo();
    initGlobal();

    const aosRefresh = () => {
      AOS.refresh();
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
    window.addEventListener('resize', debounce(aosRefresh));
  });
};
export default InitDefault;
