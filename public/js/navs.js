const operatorSideNavBarString = 
`<nav class='side-nav'>
    <div></div>
    <div class="side-nav-profile">
        <div class="profile-picture"></div>
        <div class="profile-info">
            <h3 class="profile-name">Jimmy Dago</h3>
            <h3 class="profile-type">Operator</h3>
        </div>
    </div>
    <div class="side-nav-item">
        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Problems</h3>
        <i class="fa fa-chevron-down"></i>
    </div>
    <div class="side-nav-sub-items">
        <a href="./logCall.html"><div class="side-nav-sub-item">
            <h3 class="side-nav-sub-item-title">Log Problem</h3>
        </div></a>
        <a href="./activeProblems.html"><div class="side-nav-sub-item">
            <h3 class="side-nav-sub-item-title">Active Problems</h3>
        </div></a>
        <a href="./solvedProblems.html"><div class="side-nav-sub-item">
            <h3 class="side-nav-sub-item-title">Solved Problem</h3>
        </div></a>
    </div>
    <div class="side-nav-item">
        <h3 class="side-nav-item-title"><i class="fa fa-users"></i>Specialist</h3>
        <i class="fa fa-chevron-down"></i>
    </div>
    <div class="side-nav-sub-items">
        <a href="./specialistStatus.html"><div class="side-nav-sub-item">
            <h3 class="side-nav-sub-item-title">Specialist Status</h3>
        </div></a>
        <a href="./specialistReports.html"><div class="side-nav-sub-item">
            <h3 class="side-nav-sub-item-title">Specialist Reports</h3>
        </div></a>
    </div>
    <a href="./equipment.html"><div class="side-nav-item">
        <h3 class="side-nav-item-title"><i class="fa fa-users"></i>Equipment</h3>
    </div></a>
    <a href="./software.html"><div class="side-nav-item">
        <h3 class="side-nav-item-title"><i class="fa fa-users"></i>Software</h3>
    </div></a>
    <div class="side-nav-date">
        <p id="time">14:18</p>
        <p id="date">30.10.2020</p>
    </div>
</nav>`;
if(document.getElementById('operator-side-nav') != null) {
    document.getElementById("operator-side-nav").innerHTML = operatorSideNavBarString;
}

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