import gsap from 'gsap';

const InitHero = () => {
  const heroBg = document.querySelector('.hero--bg');
  const heroSlogan = document.querySelector('.hero--slogan');
  const titleUp = heroSlogan.querySelector('.title-up');
  const titleH2 = heroSlogan.querySelector('.title-h2');
  const titleDown = heroSlogan.querySelector('.title-down');
  const menuItems = document.querySelectorAll('.menu-item');

  const siteHeaerBranding = document.querySelector('.site-header--branding');
  const init = () => {
    gsap.set(heroSlogan, { xPercent: -100, autoAlpha: 0 });
    gsap.set([titleUp, titleH2, titleDown], { autoAlpha: 0, xPercent: 5 });
    gsap.set([siteHeaerBranding, menuItems], { y: -20, autoAlpha: 0 });
    gsap.globalTimeline.timeScale(1.5);
  };

  const startHero = () => {
    const tl = gsap.timeline({ ease: 'power4.out', duration: 0.75 });

    tl.set(heroBg, { scale: 1.025 })
      .to(heroBg, {
        opacity: 1,
        duration: 1.25,
        scale: 1,
      })
      .to(heroSlogan, { xPercent: 0, autoAlpha: 1, duration: 0.85 }, '-=50%')
      .addLabel('title')
      .to(titleUp, { autoAlpha: 1, xPercent: 0, duration: 1 })
      .to(titleH2, { autoAlpha: 1, xPercent: 0, duration: 1 }, '-=50%')
      .to(titleDown, { autoAlpha: 1, xPercent: 0, duration: 1 }, '-=25%')
      .to(
        siteHeaerBranding,
        { autoAlpha: 1, y: 0, duration: 1, delay: 0.25 },
        'title'
      )
      .to(
        menuItems,
        { autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.05 },
        'title+=0.5'
      );
  };
  document.addEventListener('DOMContentLoaded', () => {
    init();
  });
  window.onload = () => {
    startHero();
  };
};
export default InitHero;
