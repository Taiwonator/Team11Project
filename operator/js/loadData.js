export function loadData(url, code) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(`Object from PHP file (${url}): ${this.responseText}`);
            code(this.responseText);
        }
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}