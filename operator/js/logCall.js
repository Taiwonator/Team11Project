//https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_tabs_close
function openTab(evt, problemName, plus) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(problemName).style.display = "block";
    if(plus) {
        for(var i = 0; i < tablinks.length; i++) {
            if (tablinks[i].dataset.name == problemName) {
                tablinks[i].className += " active";
            }
        }
    }
    evt.currentTarget.className += " active";
    console.log(problemIDs);
}

// Not w3chools
var tabCount = document.getElementsByClassName("tablinks").length;
var problemCount = 1;
var problemIDs = [];

function deleteTab(evt) {
    if(tabCount != 1) {
        evt.target.parentElement.remove();
        tabCount--;
        problemIDs = problemIDs.filter(x => x.problemID != evt.target.dataset.name);
        console.log(problemIDs);
        document.getElementById(evt.target.dataset.name).remove();
    }
}

window.onload = function() {
    loadSoftware();
    loadPersonnel();
    loadProblems();
    loadEquipment();
    loadProblemTypes();
    loadBranches();
    loadStandardSolutions();
    loadSpecialists();
    
    addTab();
}

function addTab() {
    var problemString = `<div class="new-problem" data-name="problem${problemCount}"><div class="search-element">
                                <h3 class="element-title">Equipment</h3>
                                <div class="search-element-bar">
                                    <input type="text" placeholder="Enter Serial No." onkeyup="searchTable(event, 0)">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                                <table class="search-element-table problem-input-field" data-table-name='equipmentTable'>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Type</th>
                                        <th>Make</th>
                                    </tr>
                                    ${(problemInputStrings['equipment'] != undefined) ? problemInputStrings['equipment'] : ''}
                                </table>
                            </div>

                            <div class="search-element">
                                <h3 class="element-title">Software</h3>
                                <div class="search-element-bar">
                                    <input type="text" placeholder="Enter name" onkeyup="searchTable(event, 0)">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                                <div class="search-element-table-wrapper">
                                <table class="search-element-table problem-input-field" data-table-name='softwareTable'>
                                    <tr>
                                        <th>Software Name</th>
                                        <th>Licensed</th>
                                        <th>Supported</th>
                                    </tr>
                                    ${(problemInputStrings['software'] != undefined) ? problemInputStrings['software'] : ''}
                                </table>
                                </div>
                            </div>
                            <div class="element-row">
                                <div class="select-input-element">
                                    <h3 class="element-title">Problem Type</h3>
                                    <select class='problem-input-field' data-input-type='select' data-input='problemType'>
                                        <option value="" selected disabled hidden>Select a problem type</option>
                                        ${(problemInputStrings['problemType'] != undefined) ? problemInputStrings['problemType'] : ''}
                                    </select>
                                </div>

                                <div class="select-input-element">
                                    <h3 class="element-title">Operating System</h3>
                                    <select class='problem-input-field' data-input-type='select' data-input='OS'>
                                        <option value="" selected disabled hidden>Select an OS</option>
                                        <option>Windows</option>
                                        <option>iOS</option>
                                        <option>Linux</option>
                                        <option>Doesn't require OS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-area-input-element">
                                <h3 class="element-title">Problem Description</h3>
                                <textarea class="scroll problem-input-field" data-input-type='textarea' data-input='problemDescription'></textarea>
                            </div>

                            <div class="element-row">
                                <div class="select-input-element">
                                    <h3 class="element-title">Branch</h3>
                                    <select class='problem-input-field' data-input-type='select' data-input='branch'>
                                        <option value="" selected disabled hidden>Select a branch</option>
                                        ${(problemInputStrings['branches'] != undefined) ? problemInputStrings['branches'] : ''}
                                    </select>
                                </div>
                                <div class="select-input-element">
                                    <h3 class="element-title">Priority</h3>
                                    <select class='problem-input-field' data-input-type='select' data-input='priority'>
                                        <option value="" selected disabled hidden>Select Priority</option>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>I don't know</option>
                                    </select>
                                </div>

                            </div>

                            <div class="search-element night">
                                <h3 class="element-title">Standard Solutions</h3>
                                <div class="search-element-bar">
                                    <input type="text" placeholder="Enter Problem Type" onkeyup="searchTable(event, 1)">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                                <div class="search-element-table-wrapper">

                                    <table class="search-element-table" data-table-name="standardSolutionsTable">
                                        <tr>
                                            <th>Solution Name</th>
                                            <th>Problem Type</th>
                                            <th>Description</th>
                                        </tr>
                                        ${(problemInputStrings['standardSolutions'] != undefined) ? problemInputStrings['standardSolutions'] : ''}
                                    </table>
                                
                                </div>
                            </div>

                            <div class="checkbox-input-element">
                                <h3 class="element-title">Problem Status</h3>
                                <input type="checkbox" id="solved" onclick="checkSolved(event)" class='problem-input-field' data-input-type='checkbox' data-input='status'>
                                <label>Problem solved over the phone</label>
                            </div>
                            
                            <div id="solved-form" class="hide-form">
                                <div class="text-area-input-element">
                                    <h3 class="element-title">How it was solved?</h3>
                                    <textarea class="scroll problem-input-field" data-input-type='textarea' data-input='solveMethod'></textarea>
                                </div>

                                <div class="text-area-input-element">
                                    <h3 class="element-title">Notes</h3>
                                    <textarea class="scroll problem-input-field" data-input-type='textarea' data-input='solveNotes'></textarea>
                                </div>
                            </div>

                            <div id="unsolved-form">
                                <div class="checkbox-input-element">
                                    <h3 class="element-title">In Person Solving</h3>
                                    <input type="checkbox" class='problem-input-field' data-input-type='checkbox' data-input='inPerson'>
                                    <label>Problem must be solved in person</label>
                                </div>

                                <div class="search-element">
                                    <h3 class="element-title">Specialist </h3>
                                    <input type="checkbox" id="third-party" value="third-party" onClick="checkThirdParty(event)" class="external">
                                    <label>3rd party specialist</label>

                                    <div id="specialists">
                                        <div class="search-element-bar">
                                            <input type="text" placeholder="Enter Problem Type" onkeyup="searchTable(event, 2)"> 
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                        <table class="search-element-table problem-input-field" data-table-name="specialistTable">
                                            <tr>
                                                <th>Specialist ID</th>
                                                <th>Problem Type</th>
                                                <th>No. Jobs</th>
                                                <th>Status</th>
                                                <th>In Work</th>
                                                <th>Part Time</th>
                                                <th>Next In Work</th>
                                            </tr>
                                            ${(problemInputStrings['specialists'] != undefined) ? problemInputStrings['specialists'] : ''}
                                        </table>
                                    </div>

                                    <div id="third-party-specialists" class="hide-form">
                                        <div class="search-element-bar">
                                            <input type="text" placeholder="Enter Problem Type" onkeyup="searchTable(event, 3)">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                        <table class="search-element-table problem-input-field" data-table-name='externalSpecialistTable'>
                                            <tr>
                                                <th>Third Party Specialist</th>
                                                <th>Telephone</th>
                                                <th>Active Jobs</th>
                                                <th>Expertise</th>
                                            </tr>
                                            <tr>
                                                <td>Dave</td>
                                                <td>07123456789</td>
                                                <td>10</td>
                                                <td>Printers</td>
                                            </tr>
                                            <tr>
                                                <td>Peter</td>
                                                <td>01789456123</td>
                                                <td>10</td>
                                                <td>Printers</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div></div>`;

    const existingString = `<div data-name="problem${problemCount}" class="existing-problem">
                                <div class="search-element">
                                    <h3 class="element-title">Problems</h3>
                                    <div class="search-element-bar">
                                        <input type="text" placeholder="Enter problem type" onkeyup="searchTable(event, 4)">
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="search-element-table-wrapper">
                                        <table class="search-element-table problem-input-field" data-table-name='allProblemsTable'>
                                            <tr>
                                                <th>Problem No.</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Solve Method</th>
                                                <th>Problem Type</th>
                                            </tr>                                    
                                        </table>
                                    </div>
                                </div>
                            </div>`;

    const tabString = `<div class="tablinks-container">
                            <button class="tablinks" data-name="problem${problemCount}" onclick="openTab(event, 'problem${problemCount}')" id="defaultOpen">Problem ${problemCount}</button>
                            <i data-name="problem${problemCount}" class="fa fa-times deletetab" onclick="deleteTab(event)"></i>
                        </div>`
    const tabContentString = `<div id="problem${problemCount}" class="tabcontent">
                                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                                    <button onclick="chooseExisting(event)" data-name="problem${problemCount}" class="problem-tab-button">Existing Problem</button>
                                    <button onclick="chooseNew(event)" data-name="problem${problemCount}" class="problem-tab-button">New Problem</button>
                                    </br>
                                    ${problemString}
                                    ${existingString}
                                </div>`;

    document.getElementById("tabs").insertAdjacentHTML('afterbegin', tabString);
    document.getElementById("tab-contents").insertAdjacentHTML('afterbegin', tabContentString);
    
    openTab(event, `problem${problemCount}` , true);

    let item = { problemID: `problem${problemCount}`, type: "" }
    problemIDs.push(item);
    console.log(problemIDs);

    tabCount++;
    problemCount++;

    addSelectableRows();
}

function chooseExisting(e) {
    const buttons = document.getElementsByClassName('problem-tab-button');
    for(var i = 0; i < buttons.length; i++) {
        if(buttons[i].dataset.name == e.target.dataset.name) {
            buttons[i].classList.remove('active');
        }
    }
    e.target.classList.add('active');

    const newProblems = document.getElementsByClassName('new-problem');
    const existingProblems = document.getElementsByClassName('existing-problem');

    for(var i = 0; i < newProblems.length; i++) {
        if(newProblems[i].dataset.name == e.target.dataset.name) {
            newProblems[i].style.display = 'none';
        }
    }

    for(var i = 0; i < existingProblems.length; i++) {
        if(existingProblems[i].dataset.name == e.target.dataset.name) {
            existingProblems[i].style.display = 'block';
        }
    }

    //
    for(var i = 0; i < problemIDs.length; i++) {
        if(problemIDs[i].problemID == e.target.dataset.name) {
            problemIDs[i].type = "existing";
        }
    }
}

function chooseNew(e) {
    const buttons = document.getElementsByClassName('problem-tab-button');
    for(var i = 0; i < buttons.length; i++) {
        if(buttons[i].dataset.name == e.target.dataset.name) {
            buttons[i].classList.remove('active');
        }
    }
    e.target.classList.add('active');

    const newProblems = document.getElementsByClassName('new-problem');
    const existingProblems = document.getElementsByClassName('existing-problem');

    for(var i = 0; i < newProblems.length; i++) {
        if(newProblems[i].dataset.name == e.target.dataset.name) {
            newProblems[i].style.display = 'block';
        }
    }

    for(var i = 0; i < existingProblems.length; i++) {
        if(existingProblems[i].dataset.name == e.target.dataset.name) {
            existingProblems[i].style.display = 'none';
        }
    }

    // 
    for(var i = 0; i < problemIDs.length; i++) {
        if(problemIDs[i].problemID == e.target.dataset.name) {
            problemIDs[i].type = "new";
        }
    }
}

function retreiveInputs() {
    const inputFields = document.getElementsByClassName('call-input-field');
    let obj = {
        callerName: "", 
        extension: "",
        problems: []
    };
    for(var i = 0; i < inputFields.length; i++) {
        readCallInput(obj, inputFields[i]);
    }
    for(var i = 0; i < problemIDs.length; i++) {
        if(problemIDs[i].type == "new") {
            getNewProblemInputs(obj, getNewProblem(problemIDs[i].problemID));
        } else if(problemIDs[i].type == "existing") {
            getExistingProblemInputs(obj, getExistingProblem(problemIDs[i].problemID));
        } else {
            console.log("choose!!!");
        }
    }
    validateInputs(obj);
}

function readCallInput(obj, input) {
    if(input.tagName != 'TABLE') {
        obj[input.dataset.input] = input.value;
    } else {
        let selectedRow = input.getElementsByClassName("selected-row")[0];
        addSelectedRowInputs(obj, selectedRow);
    }
}

function addSelectedRowInputs(obj, row, externalSpecialist){
    if(row != null) {
        switch(row.parentNode.parentNode.dataset.tableName) {
            case 'callerTable':
                obj['callerName'] = row.cells[1].innerHTML;
                obj['extension'] = row.cells[2].innerHTML;
                break;
            case 'equipmentTable': 
                obj['serialNumber'] = row.cells[0].innerHTML;
                break;
            case 'softwareTable':
                obj['softwareName'] = row.cells[0].innerHTML;
                break;
            case 'specialistTable': 
                if(!externalSpecialist) {
                    obj['specialistID'] = row.cells[0].innerHTML;
                }
                break;
            case 'externalSpecialistTable': 
                if(externalSpecialist) {
                    obj['externalSpecialistID'] = row.cells[0].innerHTML;
                }
                break;
            case 'allProblemsTable': 
                obj['problemNumber'] = row.cells[0].innerHTML;
                break;
            default: 
                console.log(row);
                break;
        }
    } 
}

function getNewProblem(problemName) {
    const newProblems = document.getElementsByClassName('new-problem');
    for(var i = 0; i < newProblems.length; i++) {
        if(newProblems[i].dataset.name == problemName) {
             return newProblems[i];
        }
    }
}

function getNewProblemInputs(obj, newProblem) {
    const inputs = newProblem.getElementsByClassName('problem-input-field');
    let external = newProblem.getElementsByClassName('external')[0].checked;

    let newProblemObj = {
        serialNumber: "", 
        softwareName: "", 
        specialistID: "", 
        externalSpecialistID: ""
    };
    for(var i = 0; i < inputs.length; i++) {
        if(inputs[i].tagName != 'TABLE') {
            if(inputs[i].dataset.input == 'status') {
                if(inputs[i].checked) {
                    newProblemObj[inputs[i].dataset.input] = 'solved';
                } else {
                    newProblemObj[inputs[i].dataset.input] = 'unsolved';
                }
            } else if (inputs[i].dataset.input == 'inPerson') {
                newProblemObj[inputs[i].dataset.input] = inputs[i].checked;
            } else {
                newProblemObj[inputs[i].dataset.input] = inputs[i].value;
            }
        } else {
            let selectedRow = inputs[i].getElementsByClassName("selected-row")[0];
            addSelectedRowInputs(newProblemObj, selectedRow, external);
        }
    }

    if(newProblemObj.status == 'solved') {
        newProblemObj['specialistID'] = '';
        newProblemObj['externalSpecialistID'] = '';
    }
    
    obj.problems.push(newProblemObj);
}

    function getExistingProblem(problemName) {
        const existingProblems = document.getElementsByClassName('existing-problem');
        for(var i = 0; i < existingProblems.length; i++) {
            if(existingProblems[i].dataset.name == problemName) {
                 return existingProblems[i];
            }
        }
    }

    function getExistingProblemInputs(obj, existingProblem) {
        let existingProblemObj = {
            problemNumber: ""
        };
        let selectedRow = existingProblem.getElementsByClassName("selected-row")[0];
        addSelectedRowInputs(existingProblemObj, selectedRow);
        obj.problems.push(existingProblemObj)
    }

    function validateInputs(inputs) {
        console.log("validating: ", inputs);
        const keys = Object.keys(inputs);
        let pass = true;
        for(var i = 0; i < keys.length; i++) {
            if( !validateInput(inputs, keys[i]) ) {
                pass = false;
            }
        }
        console.log(pass); 
    }

    function validateInput(inputs, key) {
        if(key != "problems") {
            if(inputs[key] == "") {
                return false;
            } else {
                return true;
            }
        } else {
            if(inputs[key].length == 0) {
                return false;
            } else {
                return validateProblemInputs(inputs[key]);
            }
        }
    }

    function validateProblemInputs(problemInputs) {
        for(var i = 0; i < problemInputs.length; i++) {
            const problemKeys = Object.keys(problemInputs[i]);
            for(var j = 0; j < problemKeys.length; j++) {
                // console.log(`key (${problemKeys[j]}): `, validateProblemInput(problemInputs, problemKeys[j]));
                console.log(`obj: ${problemInputs[i]}, keys: ${problemKeys[j]}`);
                if( !validateProblemInput(problemInputs[i], problemKeys[j]) ) {
                    console.log(`${problemKeys[j]}:${(problemInputs[i])[problemKeys[j]]}`);
                    return false;
                } 
            }
            return true;
        }
    }

    function validateProblemInput(inputs, key) {
        const solvedNullFields = ["OS", "softwareName", "solveNotes"];
        const unsolvedNullFields = ["OS", "softwareName", "solveMethod", "solveNotes"];

        if(inputs['status'] == "solved") {
            if(solvedNullFields.includes(key)) {
                return true;
            }
        } else {
            if(unsolvedNullFields.includes(key)) {
                return true;
            }
        }

        if( (key == "specialistID" || key == "externalSpecialistID") && Object.keys(inputs).length != 1 ) {
            if(inputs["specialistID"] == "" && inputs["externalSpecialistID"] == "") {
                console.log(`ID: ${inputs["specialistID"]}, external: ${inputs["externalSpecialistID"]}`);
                return false;
            }
        } else if (inputs[key] == "" && key != "specialistID" && key != "externalSpecialistID") {
            console.log(`${key}:${inputs[key]}`);
            return false;
        } else {
            return true;
        }
    }



// {
//     call: {
//         callerName,          TABLE - SELECTED ROW      ...
//         ext,                 TABLE - SELECTED ROW      ...
//         date,                DATE NOW                  ...   
//         time,                TIME NOW                  ...
//         operatorID           OPERATOR LOGGED IN        ...
//         callReason           TEXTAREA                  ...
//     }, 
//     problems: [{}, {},...,{}]
// }

// problem : {
//     serialNo,                TABLE                     ...
//     softwareName,            TABLE                     ...
//     OS,                      DROPDOWN                  ...   
//     problemType,             DROPDOWN                  ...
//     problemDescription,      TEXTAREA                  ...
//     branch,                  DROPDOWN                  ...
//     priority,                DROPDOWN                  ...
//     status (solved?),        CHECKBOX                  ...
//     inPerson,                CHECKBOX                  ...
//     specialistID,            TABLE                     ...
//     externalSpecialistID,    TABLE                     ...
//     dateSolved,              NULL / DATE NOW           ...
//     timeSolved,              NULL / TIME NOW           ...
//     solveMethod,             TEXTAREA                  ...
//     notes                    TEXTAREA                  ...
// }

// Each input has a class named 'input-field'. Then its data-input will be the object key. To actually read the input it will depend. data-inputType will tell the function how to read the data.
// A selected row will need to assign td a class 'input-field' so it is checked. It'll have a data-inputType which will tell the program to read td.innerHTML. It will also have a data-input to give it a name in the input dictionary
// For existing problems, take from object used to construct table, should have all the data. Simply take that
// Create problems array of length tabCount. Create empty problem object. Go through one tab (all inputs with problem${problemCount}) (Would require list of unique problemNums) amd assign to problems object

// data-name: refers 
// data-input: refers to the database column name
// data-input-type: refers to the type of input ()
// data-table-name: 'caller', 'solvedProblems' etc

// PROBLEMS
// Inputs should all be filled out according to existing problem if that one is chosen. Need an object which returns all the previously solved problems. 
// If specialist is set, 3rd party specialist should not be. Only check if input....



// Sort out problemsArray x 
// Obj { problemNo } needs to be made x

// None of call can be null
// Os NULL
// Software NULL
// DateSolved NULL
// TimeSolved NULL
// SolveMethod NULL
// ID NULL (Although, ExternalID cannot be null)
// ExternalID NULL (Although if null, ID cannot be null)

// CHECK FOR NULLS
// ADD DATE AND TIME SOLVED

