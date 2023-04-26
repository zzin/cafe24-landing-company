import InitBanner from './initBanner';
import InitDark from './initDark';
import InitDefault from './initDefault';
import InitFaq from './initFaq';
import InitFlickity from './initFlickity';
import InitHero from './initHero';
import InitMarquee from './initMarquee';
import InitRequest from './initRequest';
import InitNavigation from './initNavigation';
import InitScrollTop from './initScrollTop';
import InitSingle from './initSingle';

const body = document.body;

const initDefault = new InitDefault();
const initNavigation = new InitNavigation();
const initDark = new InitDark();
if (body.classList.contains('home')) {
  const initHero = new InitHero();
}
if (body.classList.contains('single')) {
  const initSingle = new InitSingle();
}
const initFlickity = new InitFlickity();
// const initBanner = new InitBanner();
const initMarquee = new InitMarquee();
const initFaq = new InitFaq();
const initRequest = new InitRequest();
const initScrollTop = new InitScrollTop();
