/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectAll(id) {
    
    document.getElementById(id).focus();
    document.getElementById(id).select();
    
    alert('Press Ctrl + C to copy.');
}

$(function () { $("[data-toggle='popover']").popover(); });

function confirmDelete() {
    return confirm("Are you sure you want to delete?");
}

function checkP(newP,confP) {
    var x = document.getElementById(newP).value;
    alert(x);
    var y = document.getElementById(confP).value;
    if (x.trim() !== "") {
        //alert(x);
        if(x !== y) {
            alert("Both password fields do not match!");
            return false;
        }
        else {
            //alert("Yo");
            return true;
        }
    }
}