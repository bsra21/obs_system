const selectElement=function(element){
	return document.querySelector(element);
};
let menuToggler=selectElement('.menu-toggle');
let body=selectElement('body');
menuToggler.addEventListener('click',function(){
	body.classList.toggle('open');
});

//scroll reveal
window.sr=ScrollReveal();

sr.reveal('.animate-left',{
	origin:'left',
	duration:1000,
	distance:'25rem',
	delay:300
});

sr.reveal('.animate-right',{
	origin:'right',
	duration:1000,
	distance:'25rem',
	delay:600
});

sr.reveal('.animate-top',{
	origin:'top',
	duration:1000,
	distance:'25rem',
	delay:600
});

sr.reveal('.animate-bottom',{
	origin:'bottom',
	duration:1000,
	distance:'25rem',
	delay:600
});


/*SLİDER BAŞLANGIÇ*/
{
	class SliderClip {
		constructor(el) {
			this.el = el;
			this.Slides = Array.from(this.el.querySelectorAll('li'));
			this.Nav = Array.from(this.el.querySelectorAll('nav a'));
			this.totalSlides = this.Slides.length;
			this.current = 0;
			this.autoPlay = true; //true or false
			this.timeTrans = 4000; //transition time in milliseconds
			this.IndexElements = [];

			for(let i=0;i<this.totalSlides;i++) {
				this.IndexElements.push(i);
			}

			this.setCurret();
			this.initEvents();
		}
		setCurret() {
			this.Slides[this.current].classList.add('current');
			this.Nav[this.current].classList.add('current_dot');
		}
		initEvents() {
			const self = this;

			this.Nav.forEach((dot) => {
				dot.addEventListener('click', (ele) => {
					ele.preventDefault();
					this.changeSlide(this.Nav.indexOf(dot));
				})
			})

			this.el.addEventListener('mouseenter', () => self.autoPlay = false);
			this.el.addEventListener('mouseleave', () => self.autoPlay = true);

			setInterval(function() {
				if (self.autoPlay) {
					self.current = self.current < self.Slides.length-1 ? self.current + 1 : 0;
					self.changeSlide(self.current);
				}
			}, this.timeTrans);

		}
		changeSlide(index) {

			this.Nav.forEach((allDot) => allDot.classList.remove('current_dot'));

			this.Slides.forEach((allSlides) => allSlides.classList.remove('prev', 'current'));

			const getAllPrev = value => value < index;

			const prevElements = this.IndexElements.filter(getAllPrev);

			prevElements.forEach((indexPrevEle) => this.Slides[indexPrevEle].classList.add('prev'));

			this.Slides[index].classList.add('current');
			this.Nav[index].classList.add('current_dot');
		}
	}

	const slider = new SliderClip(document.querySelector('.slider'));
}

/*LOGİN JS
$('.error-page').hide(0);

$('.login-button , .no-access').click(function(){
  $('.login').slideUp(500);
  $('.error-page').slideDown(1000);
});

$('.try-again').click(function(){
  $('.error-page').hide(0);
  $('.login').slideDown(1000);
});*/

