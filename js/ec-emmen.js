document.addEventListener("DOMContentLoaded", () => {
	
	const onToggleMobileNavigation = () => {
		
		const nav = document.querySelector("nav.header");
		
		document.querySelectorAll(".mobile-navigation").forEach((e) => {
			if(e.classList.contains("hidden")){
				e.classList.remove("hidden");
				nav.style.height = "100%";
			}else{
				e.classList.add("hidden");
				nav.style.height = "auto";
			}
		});
	};
	
	const toggleSubmenu = (navItem) => {
		const subMenu = navItem.querySelector(".sub-menu");
		if(!subMenu){
			//not all pages are subpages
			return;
		}
		const triangle = navItem.querySelector(".triangle");
		
		if(subMenu.classList.contains("hidden")){
			subMenu.classList.remove("hidden");
			triangle.classList.add("rotate-180");
		}else{
			subMenu.classList.add("hidden");
			triangle.classList.remove("rotate-180");
			navItem.blur();
		}
	};
	
	const onToggleSubmenu = (e) => {
		e.preventDefault();
		e.stopPropagation();
		
		
		const btn = e.currentTarget || e.target;
		toggleSubmenu(btn.parentElement);
	};
	
	const onToggleActivity = (e) => {
		
		const activity = e.currentTarget || e.target;
		
		if(activity.classList.contains("on-hover")){
			activity.classList.remove("on-hover");
			activity.querySelector(".fa-chevron-down").classList.remove("rotate-180");
		}else{
			activity.classList.add("on-hover");
			activity.querySelector(".fa-chevron-down").classList.add("rotate-180");
		}
	};
	
	document.querySelectorAll(".toggle-mobile-navigation").forEach(e => e.addEventListener("click", onToggleMobileNavigation));
	
	document.querySelectorAll(".toggle-submenu > .link").forEach(e => e.addEventListener("click", onToggleSubmenu));
	
	document.querySelectorAll(".activity.hover").forEach(e => e.addEventListener("click", onToggleActivity));
	
	document.querySelectorAll(".mobile-navigation .current_page_parent").forEach(toggleSubmenu);
	
	const lightbox = GLightbox({
	    touchNavigation: true,
	    loop: true,
	    autoplayVideos: true
	});
	
	//iframes
	
	const debounce = (func, wait, immediate) => {
		let timeout;
		return function() {
			let context = this, args = arguments;
			let later = () => {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			let callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};
	
	const recomputeIframes = debounce(() => {
		document.querySelectorAll("iframe[width][height]").forEach(e => {
			const {width} = e.getBoundingClientRect();
			const h = parseInt(e.height);
			const w = parseInt(e.width);

			e.style.height = `${h/w * width}px`;
		});
	}, 100);
	
	
	//do it once when the page loads
	recomputeIframes();
	//and then when the window is resized
	window.addEventListener("resize", recomputeIframes);
	
	// line-clamps
	document.querySelectorAll(".clamp").forEach((el) => {
		const more = el.querySelector(".toggle-line-clamp .more");
		const less = el.querySelector(".toggle-line-clamp .less");
		const content = el.querySelector(".content");
		
		if(more == null || less == null || content == null){
			return;
		}
		
		// check if there is overflow
		if(content.clientHeight < content.scrollHeight){
			more.addEventListener("click", () => {
				el.classList.remove("clamped");
			});
			
			less.addEventListener("click", () => {
				el.classList.add("clamped");
			});
		}else{
			// otherwise remove the toggles
			more.remove();
			less.remove();
		}
	});
});

window.addEventListener('load', function(){
	const el = document.querySelector('.glider');
	
	if(el){
		const glider = new Glider(el, {
			arrows: {
				prev: '.glider-prev',
				next: '.glider-next'
			},
			dots: '.dots',
			scrollLock: true,
			rewind: true,
			draggable: false
		});
		
		const gotoNextSlide = () => {
			glider.scrollItem((glider.getCurrentSlide() + 1) % glider.slides.length);
		};
		
		let autoplay = setInterval(gotoNextSlide, 7500);
		
		el.addEventListener("mouseenter", () => clearInterval(autoplay));
		el.addEventListener("mouseleave", () => {
			autoplay = setInterval(gotoNextSlide, 7500);
		});
	}
});

const aLazyLoad = new LazyLoad();