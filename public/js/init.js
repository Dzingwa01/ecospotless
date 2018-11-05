console.log("initialising");
M.AutoInit();
let options = [];
$(document).ready(function(){
    console.log("initialising 12345");
    $('.sidenav').sidenav();
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
});