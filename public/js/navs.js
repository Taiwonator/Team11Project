const items = document.getElementsByClassName("side-nav-item");
        var selectedItem ;

        for(var i = 0; i < items.length; i++) {
            if(items[i].nextElementSibling != null) {
                if(items[i].nextElementSibling.classList.contains("side-nav-sub-items")) {
                    // items[i].onclick = () => nextSibling[i].classList.toggle("sub-items-collapsed");
                    items[i].onclick = function(e) {
                        for(var i = 0; i < e.path.length; i++) {
                            if(e.path[i].classList != undefined) {
                                if(e.path[i].classList.contains("side-nav-item")) {
                                    e.path[i].nextElementSibling.classList.toggle("sub-items-uncollapsed");
                                    e.path[i].classList.toggle("side-nav-item-selected");
                                    selectedItem = e.path[i];
                                }
                            }
                        }
                    }
                }
            }
        }