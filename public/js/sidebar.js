document.addEventListener('DOMContentLoaded', () => {
    const hamBurger = document.querySelector(".toggle-btn");
    const overlay = document.querySelector("#overlay");
    const sidebar = document.querySelector("#sidebar");

    const toggleSidebar = () => {
        sidebar.classList.toggle("expand");
        overlay.style.display = sidebar.classList.contains("expand") ? "block" : "none";
    };

    const closeSidebar = () => {
        sidebar.classList.remove("expand");
        overlay.style.display = "none";
    };

    hamBurger.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleSidebar();
    });

    overlay.addEventListener("click", (e) => {
        e.stopPropagation(); 
        closeSidebar();
    });

    document.addEventListener("click", (e) => {
        if (sidebar.classList.contains("expand") && !sidebar.contains(e.target) && !hamBurger.contains(e.target)) {
            closeSidebar();
        }
    });
});