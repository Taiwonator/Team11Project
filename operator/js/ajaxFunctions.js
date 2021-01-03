window.onload = function() {
    loadSoftware();
    loadPersonnel();
    loadProblems();

    addTab();
}

var softwareString;

function loadData(url, code) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            code(this.responseText);
            console.log(`Object from PHP file (${url}): ${this.responseText}`);
        }
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}

function loadProblems() {
    loadData('../php/sql_select_problems.php', function(json){
        var tables = document.getElementsByClassName("search-element-table");
        for(var i = 0; i < tables.length; i++) {
            if(tables[i].dataset.tableName == 'allProblemsTable') {
                tables[i].innerHTML = ` <tr>
                                            <th>Problem No.</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Solve Method</th>
                                            <th>Problem Type</th>
                                        </tr>
                                        ${generateProblemsTable(json)}`;
            }
        }
        addSelectableRows();
    });
}


function loadPersonnel() {
    loadData('../php/sql_select_personnel.php', function(json){
        var tables = document.getElementsByClassName("search-element-table");
        for(var i = 0; i < tables.length; i++) {
            if(tables[i].dataset.tableName == 'callerTable') {
                tables[i].innerHTML = ` <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Extension</th>
                                            <th>Job Title</th>
                                            <th>Department</th>
                                            <th>Email</th>
                                            <th>Branch ID</th>
                                        </tr>
                                        ${generatePersonnelTable(json)}`;
            }
        }
        addSelectableRows();
    });
}

function loadSoftware() {
    loadData('../php/sql_select_software.php', function(json){
        softwareString = generateSoftwareTable(json);
            
        // Sets first created to the correct value
        var tables = document.getElementsByClassName("search-element-table");
        for(var i = 0; i < tables.length; i++) {
            if(tables[i].dataset.tableName == 'softwareTable') {
                tables[i].innerHTML = `<tr>
                                            <th>Software Name</th>
                                            <th>Licensed</th>
                                            <th>Supported</th>
                                        </tr>
                                        ${softwareString}`;
            }
        }
        addSelectableRows();
    });
}

function generateProblemsTable(json) {
    const obj = JSON.parse(json); // Converts JSON to Javascript Object
    const outputArray = obj.map(problem => {
        return `<tr>
                    <td>${problem.problemNumber}</td>
                    <td>${problem.description}</td>
                    <td>${problem.status}</td>
                    <td>${problem.solveMethod}</td>
                    <td>${problem.problemType}</td>
                </tr>`;
    })
    let output = ``;
    for(var i = 0; i < outputArray.length; i++) {
        output += outputArray[i];
    }
    return output;
}

function generatePersonnelTable(json) {
    const obj = JSON.parse(json); // Converts JSON to Javascript Object
    const outputArray = obj.map(personnel => {
        return `<tr>
                    <td>${personnel.id}</td>
                    <td>Harriet Simmons</td>
                    <td>0</td>
                    <td>${personnel.jobTitle}</td>
                    <td>${personnel.dept}</td>
                    <td>${personnel.email}</td>
                    <td>${personnel.branchID}</td>
                </tr>`;
    })
    let output = ``;
    for(var i = 0; i < outputArray.length; i++) {
        output += outputArray[i];
    }
    return output;
}

function generateSoftwareTable(json) {
    const obj = JSON.parse(json); // Converts JSON to Javascript Object
    const outputArray = obj.map(software => {
        return `<tr><td>${software.softwareName}</td>
                ${(software.licensed == 1) ? '<td><i class="fa fa-check-square"></i></td>' : '<td></td>'}
                ${(software.supported == 1) ? '<td><i class="fa fa-check-square"></i></td>' : '<td></td>'}</tr>`;
    })
    let output = ``;
    for(var i = 0; i < outputArray.length; i++) {
        output += outputArray[i];
    }
    return output;
}
