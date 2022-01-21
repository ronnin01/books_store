


//Navigation bar nav slide menu bar
function nav_slide_menu_bar(){
    $(document).ready(()=>{
        $('#nav-slide-menu-bar').click(()=>{
            $('#nav-bar-menu-list').slideToggle();
        });
    });
}

//Functions run

nav_slide_menu_bar();