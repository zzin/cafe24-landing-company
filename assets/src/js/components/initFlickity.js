import AOS from 'aos';
import Flickity from 'flickity';
import imagesLoaded from 'imagesloaded';

const InitFlickity = () => {
  let barWidth = 0;
  let totalSlide = 0;
  let flickityBtnPrev, flickityBtnNext;
  let flickityBtns;
  const makeLineBar = (num) => {
    const bar = document.querySelector('.flickity-nav-line .bar');
    totalSlide = num;
    barWidth = (1 / num) * 100;
    bar.style.width = barWidth + '%';
  };
  const moveLineBar = (num) => {
    const bar = document.querySelector('.flickity-nav-line .bar');
    bar.style.left = barWidth * num + '%';
    flickityBtns.forEach((el) => {
      el.classList.remove('is-not');
    });
    if (Number(num) <= 0) {
      document.querySelector('.btn--oval.left').classList.add('is-not');
    }
    if (Number(num + 1) >= totalSlide) {
      document.querySelector('.btn--oval.right').classList.add('is-not');
    }
  };
  const makeControlBtn = (el) => {
    const btns = el.querySelectorAll('.control .btn');
    flickityBtns = el.querySelectorAll('.btn--oval');
    flickityBtnPrev = el.querySelector('.flickity-button.previous');
    flickityBtnNext = el.querySelector('.flickity-button.next');
    Array.from(btns).forEach((btn) => {
      btn.addEventListener('click', (e) => {
        if (e.target.classList.contains('left')) {
          flickityBtnPrev.click();
        }
        if (e.target.classList.contains('right')) {
          flickityBtnNext.click();
        }
      });
    });
  };
  const makeFlickity = (el) => {
    const target = el.querySelector('.flickity');
    const imgLoad = imagesLoaded(target);
    imgLoad.on('done', function (instance) {
      const flkty = new Flickity(target, {
        cellAlign: 'center',
        contain: true,
        on: {
          ready: () => {
            setInterval(() => {
              AOS.refresh();
            }, 500);
          },
          change: (e) => {
            moveLineBar(e);
          },
        },
      });
      const newDiv = document.createElement('div');
      const newDivBar = document.createElement('div');
      newDivBar.classList.add('bar');
      newDiv.classList.add('flickity-nav-line');
      newDiv.appendChild(newDivBar);
      target.appendChild(newDiv);
      makeLineBar(flkty.cells.length);
      makeControlBtn(el);
      moveLineBar(0);
    });
  };
  document.addEventListener('DOMContentLoaded', () => {
    const components = document.querySelectorAll('[data-component="flickity"]');
    if (components) {
      Array.from(components).forEach((el) => {
        makeFlickity(el);
      });
    }
  });
};
export default InitFlickity;
