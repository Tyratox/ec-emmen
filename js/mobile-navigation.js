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
		const btn = e.currentTarget || e.target;
		const navItem = btn.parentElement.parentElement;
		const subMenu = navItem.querySelector(".sub-menu");
		
		if(subMenu.classList.contains("hidden")){
			subMenu.classList.remove("hidden");
			btn.classList.add("rotate-180");
		}else{
			subMenu.classList.add("hidden");
			btn.classList.remove("rotate-180");
		}
	};
	
	document.querySelectorAll(".toggle-mobile-navigation").forEach(e => e.addEventListener("click", onToggleMobileNavigation));
	
	document.querySelectorAll(".toggle-submenu").forEach(e => e.addEventListener("click", onToggleSubmenu));
});