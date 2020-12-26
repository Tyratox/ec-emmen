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
		console.log(navItem);
		const subMenu = navItem.querySelector(".sub-menu");
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
		}else{
			activity.classList.add("on-hover");
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
});