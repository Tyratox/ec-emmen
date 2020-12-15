document.addEventListener("DOMContentLoaded", () => {
	
	const onToggleMobileNavigation = () => {
		document.querySelectorAll(".mobile-navigation").forEach((e) => {
			if(e.classList.contains("hidden")){
				e.classList.remove("hidden");
			}else{
				e.classList.add("hidden");
			}
		});
	};
	
	const onToggleSubmenu = (e) => {
		e.preventDefault();
		e.stopPropagation();
		
		
		const btn = e.currentTarget || e.target;
		const navItem = btn.parentElement.parentElement;
		const subMenu = navItem.querySelector(".sub-menu");
		const triangle = navItem.querySelector(".triangle");
		
		if(subMenu.classList.contains("hidden")){
			subMenu.classList.remove("hidden");
			triangle.classList.add("rotate-180");
		}else{
			subMenu.classList.add("hidden");
			triangle.classList.remove("rotate-180");
		}
	};
	
	const onToggleActivity = (e) => {
		
		const activity = e.currentTarget || e.target;
		
		if(activity.classList.contains("on-hover")){
			activity.classList.remove("on-hover");
		}else{
			activity.classList.add("on-hover");
		}
	};
	
	document.querySelectorAll(".toggle-mobile-navigation").forEach(e => e.addEventListener("click", onToggleMobileNavigation));
	
	document.querySelectorAll(".toggle-submenu").forEach(e => e.addEventListener("click", onToggleSubmenu));
	
	document.querySelectorAll(".activity.hover").forEach(e => e.addEventListener("click", onToggleActivity));
	
	const lightbox = GLightbox({
	    touchNavigation: true,
	    loop: true,
	    autoplayVideos: true
	});
});