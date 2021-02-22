var name = 'placeholder';
if(sessionStorage) {
    name = sessionStorage.getItem("name");
}

const operatorSideNavBarString = `<nav class='side-nav'>
                                    <div class="side-nav-profile">
                                        <div class="profile-picture"></div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">${name}</h3>
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

                                    <div class="side-nav-item">
                                        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Edit</h3>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="side-nav-sub-items">
                                        <a href="./equipment.html"><div class="side-nav-sub-item">
                                        <h3 class="side-nav-sub-item-title">Equipment</h3>
                                        </div></a>
                                        <a href="./software.html"><div class="side-nav-sub-item">
                                            <h3 class="side-nav-sub-item-title">Software</h3>
                                        </div></a>
                                        <a href="./problemTypes.html"><div class="side-nav-sub-item">
                                            <h3 class="side-nav-sub-item-title">Problem Types</h3>
                                        </div></a>
                                        <a href="./standardSolutions.html"><div class="side-nav-sub-item">
                                            <h3 class="side-nav-sub-item-title">Standard Solutions</h3>
                                        </div></a>
                                    </div>
                                    <div class="side-nav-date">
                                    </div>
                                </nav>`;

const operatorSideNav = document.getElementById('operator-side-nav');
if(operatorSideNav != null) {
    operatorSideNav.innerHTML = operatorSideNavBarString;
}

const analystSideNavString = `<nav class='side-nav'>
                                <div class="side-nav-profile">
                                    <div class="profile-picture"></div>
                                    <div class="profile-info">
                                        <h3 class="profile-name">${name}</h3>
                                        <h3 class="profile-type">Analyst</h3>
                                    </div>
                                </div>
                                <div class="side-nav-item">
                                    <h3 class="side-nav-item-title"><i class="fa fa-database"></i></i>Data</h3>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="side-nav-sub-items">
                                    <div class="side-nav-sub-item">
                                        <h3 class="side-nav-sub-item-title">Get Data</h3>
                                    </div>
                                </div>
                                <div class="side-nav-date">
                                </div>
                            </nav>`;

const analystSideNav = document.getElementById('analyst-side-nav');
if(analystSideNav != null) {
    analystSideNav.innerHTML = analystSideNavString;
} 

const hrSideNavString = `<nav class='side-nav'>
                            <div class="side-nav-profile">
                                <div class="profile-picture"></div>
                                <div class="profile-info">
                                    <h3 class="profile-name">${name}</h3>
                                    <h3 class="profile-type">Human Resources</h3>
                                </div>
                            </div>
                            <div class="side-nav-item">
                                <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Personnel</h3>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="side-nav-sub-items">
                                <div class="side-nav-sub-item">
                                    <h3 class="side-nav-sub-item-title">Personnel List</h3>
                                </div>
                            </div>
                            <div class="side-nav-date">
                            </div>
                        </nav>`;
const hrSideNav = document.getElementById('hr-side-nav');
if(hrSideNav != null) {
    hrSideNav.innerHTML = hrSideNavString;
}

const specialistSideNavString = `<nav class='side-nav'>
                                    <div class="side-nav-profile">
                                        <div class="profile-picture"></div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">${name}</h3>
                                            <h3 class="profile-type">Specialist</h3>
                                        </div>
                                    </div>
                                    <div class="side-nav-item">
                                        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Problems</h3>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="side-nav-sub-items">
                                        <a href="./activeProblems.html"><div class="side-nav-sub-item">
                                            <h3 class="side-nav-sub-item-title">Active Problems</h3>
                                        </div></a>
                                        <a href="./solvedProblems.html"><div class="side-nav-sub-item">
                                            <h3 class="side-nav-sub-item-title">Solved Problems</h3>
                                        </div></a>
                                    </div>
                                    <a href="./equipment.html"><div class="side-nav-item">
                                        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Equipment</h3>
                                    </div></a>
                                    <a href="./software.html"><div class="side-nav-item">
                                        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Software</h3>
                                    </div></a>
                                    <a href="./status.html"><div class="side-nav-item">
                                        <h3 class="side-nav-item-title"><i class="fa fa-list"></i>Status</h3>
                                    </div></a>
                                    <div class="side-nav-date">
                                    </div>
                                </nav>`;
const specialistSideNav = document.getElementById('specialist-side-nav');
if(specialistSideNav != null) {
    specialistSideNav.innerHTML = specialistSideNavString;
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