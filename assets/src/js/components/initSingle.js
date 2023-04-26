import { gsap } from 'gsap';

const InitSingle = () => {
  const siteHeaerBranding = document.querySelector('.site-header--branding');
  const menuItems = document.querySelectorAll('.menu-item');
  const tl = gsap.timeline({ ease: 'power4.out', duration: 0.75 });
  tl.to(siteHeaerBranding, { autoAlpha: 1, y: 0, duration: 1 }).to(
    menuItems,
    { autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.05 },
    '<'
  );
};
export default InitSingle;
