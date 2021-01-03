 
 
 function checkSolved(e) {
            if(e.target.checked) {
                document.querySelector("#unsolved-form").classList.add("hide-form");
                document.querySelector("#solved-form").classList.remove("hide-form");
            } else {
                document.querySelector("#solved-form").classList.add("hide-form");
                document.querySelector("#unsolved-form").classList.remove("hide-form");
            }
        }

function checkThirdParty(e) {
  if(e.target.checked) {
    document.querySelector("#specialists").classList.add("hide-form");
    document.querySelector("#third-party-specialists").classList.remove("hide-form");
  } else {
    document.querySelector("#third-party-specialists").classList.add("hide-form");
    document.querySelector("#specialists").classList.remove("hide-form");
  }
}

  

// // Get the editScreen
// var editScreen = document.getElementById("edit-screen");
// var viewScreen = document.getElementById("view-screen");

// // When the user clicks the button, open the editScreen --------------------------------
// var closeButtons = document.getElementsByClassName("close");
// var viewButtons = document.getElementsByClassName("view-button");
// var confirmButtons = document.getElementsByClassName("confirm-edit");
// var editButtons = document.getElementsByClassName("edit-button");

// if(confirmButtons != undefined) {
//   for(var i = 0; i < editButtons.length; i++) {
//       editButtons[i].onclick = function() {
//           editScreen.style.display = "block";
//       }
//   }
// } 

// if(confirmButtons != undefined) {
//   for(var i = 0; i < viewButtons.length; i++) {
//       viewButtons[i].onclick = function() {
//           viewScreen.style.display = "block";
//       }
//   }
// } 

// if(confirmButtons != undefined) {
//   for(var i = 0; i < confirmButtons.length; i++) {
//     confirmButtons[i].onclick = function() {
//       if(editScreen != undefined) {
//         editScreen.style.display = "none";
//       } 
//       if(viewScreen != undefined) {
//         viewScreen.style.display = "none";
//       }
//     }
//   } 
// }

// if(confirmButtons != undefined) {
//   for(var i = 0; i < closeButtons.length; i++) {
//     closeButtons[i].onclick = function() {
//       if(editScreen != undefined) {
//         editScreen.style.display = "none";
//       } 
//       if(viewScreen != undefined) {
//         viewScreen.style.display = "none";
//       }
//     }
//   } 
// }


// // -------------------------------------------------------------------------

// // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_filter_table
// function searchTable(e, index) {
//   var input, filter, table, tr, td, i, txtValue;
//   input = e.target;
//   filter = input.value.toUpperCase();
//   table = e.target.parentNode.nextElementSibling;
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[index];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }


// Selection
function addSelectableRows() {
  const rows = document.getElementsByTagName("tr");
  for(var i = 0; i < rows.length; i++) {
    rows[i].onclick = (e) => {
      let row = e.target.parentNode;
      let table = row.parentNode;
      for(var i = 1; i < table.childNodes.length; i++) {
        if(table.childNodes[i].tagName == "TR") {
          if(table.childNodes[i] != row) {
            table.childNodes[i].classList.remove("selected-row");
          } else {
            table.childNodes[i].classList.toggle("selected-row")
          }
        }
      }
    }
  }
}
addSelectableRows();
