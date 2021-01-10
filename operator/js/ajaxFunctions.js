window.onload = function() {
    
}

var allProblemsArray = [];

var problemInputStrings = {}

function loadData(method, url, data, code) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(`Object from PHP file (${url}): ${this.responseText}`);
            code(this.responseText);
        } 
    }
    xhttp.open(method, url, true);
    xhttp.setRequestHeader('Content-type', 'application/json');
    xhttp.send(JSON.stringify(data));
}

function getTable(tableName) {
    var tables = document.getElementsByClassName("search-element-table");
        for(var i = 0; i < tables.length; i++) {
            if(tables[i].dataset.tableName == tableName) {
                return tables[i];
            }
        }
}

function loadExternalSpecialists() {
    loadData('GET', '../php/logCall/sql_select_externalSpecialists.php', {}, function(json){
        problemInputStrings['externalSpecialists'] = generateExternalSpecialistsTable(json);

        var table = getTable('externalSpecialistTable');
        table.innerHTML = ` <tr>
                                <th>External Specialist ID</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Expertise</th>
                            </tr>
                            ${problemInputStrings['externalSpecialists']}`
        addSelectableRows();
    });
}

function loadSpecialists() {
    loadData('GET', '../php/logCall/sql_select_specialists.php', {}, function(json){
        problemInputStrings['specialists'] = generateSpecialistsTable(json);

        var table = getTable('specialistTable');
        table.innerHTML = ` <tr>
                                    <th>Specialist ID</th>
                                    <th>Problem Type</th>
                                    <th>No. Jobs</th>
                                    <th>Status</th>
                                    <th>In Work</th>
                                    <th>Part Time</th>
                                    <th>Next In Work</th>
                                </tr>
                                ${problemInputStrings['specialists']}`;
            
        
        addSelectableRows();
    });
}

function loadStandardSolutions() {
    loadData('GET', '../php/logCall/sql_select_standardSolutions.php', {}, function(json){
        problemInputStrings['standardSolutions'] = generateStandardSolutionsTable(json);

        var table = getTable('standardSolutionsTable');
        table.innerHTML = ` <tr>
                                    <th>Solution Name</th>
                                    <th>Problem Type</th>
                                    <th>Description</th>
                                </tr>
                                ${problemInputStrings['standardSolutions']}`;
        addSelectableRows();
    });
}

function loadBranches() {
    loadData('GET', '../php/logCall/sql_select_branches.php', {}, function(json){
        problemInputStrings['branches'] = generateBranches(json);

        var inputs = document.getElementsByClassName("problem-input-field");
        for(var i = 0; i < inputs.length; i++) {
            if(inputs[i].dataset.input == 'branch') {
                inputs[i].innerHTML = ` <option value="" selected disabled hidden>Select a branch</option>
                                        ${problemInputStrings['branches']}`;
            }
        }
    });
}

function loadProblemTypes() {
    loadData('GET', '../php/logCall/sql_select_problemType.php', {}, function(json){
        problemInputStrings['problemType'] = generateProblemTypes(json);

        var inputs = document.getElementsByClassName("problem-input-field");
        for(var i = 0; i < inputs.length; i++) {
            if(inputs[i].dataset.input == 'problemType') {
                inputs[i].innerHTML = ` <option value="" selected disabled hidden>Select a problem type</option>
                                        ${problemInputStrings['problemType']}`;
            }
        }
    });
}

function loadEquipment() {
    loadData('GET', '../php/logCall/sql_select_equipment.php', {}, function(json){
        problemInputStrings['equipment'] = generateEquipmentTable(json);

        var table = getTable('equipmentTable');
        table.innerHTML = `<tr>
                                <th>Serial No.</th>
                                <th>Type</th>
                                <th>Make</th>
                            </tr>
                                ${problemInputStrings['equipment']}`;
        addSelectableRows();
    });
}

function loadProblems() {
    loadData('GET', '../php/logCall/sql_select_problems.php', {}, function(json){
        problemInputStrings['allProblems'] = generateProblemsTable(json);

        var table = getTable('allProblemsTable');
        table.innerHTML = ` <tr>
                                    <th>Problem No.</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Solve Method</th>
                                    <th>Problem Type</th>
                                </tr>
                                ${generateProblemsTable(json)}`;
        addSelectableRows();
    });
}


function loadPersonnel() {
    loadData('GET', '../php/logCall/sql_select_personnel.php', {}, function(json){

        var table = getTable('callerTable');
        table.innerHTML = ` <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Extension</th>
                                    <th>Job Title</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Branch ID</th>
                                </tr>
                                ${generatePersonnelTable(json)}`;
        addSelectableRows();
    });
}

function loadSoftware() {
    loadData('GET', '../php/logCall/sql_select_software.php', {}, function(json){
        problemInputStrings['software'] = generateSoftwareTable(json);
        // Sets first created to the correct value
        var table = getTable('softwareTable');
        table.innerHTML = `<tr>
                                    <th>Software Name</th>
                                    <th>Licensed</th>
                                    <th>Supported</th>
                                </tr>
                                ${problemInputStrings['software']}`;
        addSelectableRows();
    });
}

function generateTable(json, mapFunc) {
    const obj = JSON.parse(json); // Converts JSON to Javascript Object
    const outputArray = obj.map(mapFunc);
    let output = ``;
    for(var i = 0; i < outputArray.length; i++) {
        output += outputArray[i];
    }
    return output;
}

function generateExternalSpecialistsTable(json) {
    return generateTable(json, (externalSpecialist) => {
        return `<tr>
                    <td>${externalSpecialist.externalID}</td>
                    <td>${externalSpecialist.name}</td>
                    <td>${externalSpecialist.contactNumber}</td>
                    <td>${externalSpecialist.expertise}</td>
                </tr>`
    })
}

function generateSpecialistsTable(json) {
    return generateTable(json, (specialist) => {
        return `<tr>
                    <td>${specialist.id}</td>
                    <td>${specialist.problemType}</td>
                    <td>${specialist.numJobs}</td>
                    <td>${specialist.status}</td>
                    <td>${(specialist.inWork == 1) ? '<i class="fa fa-check-square"></i>' : ''}</td>
                    <td>${(specialist.partTime == 1) ? '<td><i class="fa fa-check-square"></i></td>' : ''}</td>
                    <td>${specialist.nextInWork}</td>
                </tr>`
    })
}


function generateStandardSolutionsTable(json) {
    return generateTable(json, (solution) => {
        return `<tr>
                    <td>${solution.name}</td>
                    <td>${solution.description}</td>
                    <td>${solution.problemType}</td>
                </tr>`
    })
}


function generateBranches(json) {
    return generateTable(json, (branch) => {
        return `<option value="${branch.id}">${branch.country}</option>`
    })
}


function generateProblemTypes(json) {
    return generateTable(json, (type) => {
        return `<option>${type.problemType}</option>`
    })
}


function generateEquipmentTable(json) {
    return generateTable(json, (equipment) => {
        return `<tr>
                    <td>${equipment.serialNumber}</td>
                    <td>${equipment.type}</td>
                    <td>${equipment.make}</td>
                </tr>`
    })
}


function generateProblemsTable(json) {
    return generateTable(json, (problem) => {
        return `<tr>
                    <td>${problem.problemNumber}</td>
                    <td>${problem.description}</td>
                    <td>${problem.status}</td>
                    <td>${(problem.solveMethod == null) ? 'Not solved yet' : problem.solveMethod}</td>
                    <td>${problem.problemType}</td>
                </tr>`
    })
}


function generatePersonnelTable(json) {
    return generateTable(json, (personnel) => {
        return `<tr>
                    <td>${personnel.id}</td>
                    <td>${personnel.name}</td>
                    <td>${personnel.ext}</td>
                    <td>${personnel.jobTitle}</td>
                    <td>${personnel.dept}</td>
                    <td>${personnel.email}</td>
                    <td>${personnel.branchID}</td>
                </tr>`
    })
}


function generateSoftwareTable(json) {
    return generateTable(json, (software) => {
        return `<tr>
                    <td>${software.softwareName}</td>
                    ${(software.licensed == 1) ? '<td><i class="fa fa-check-square"></i></td>' : '<td></td>'}
                    ${(software.supported == 1) ? '<td><i class="fa fa-check-square"></i></td>' : '<td></td>'}
                </tr>`
    })
}

