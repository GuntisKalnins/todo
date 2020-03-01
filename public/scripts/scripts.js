

// function checkPass() {
//     if (document.getElementById('pw1').value ===
//             document.getElementById('pw2').value) {
//         document.getElementById('submit').disabled = false;
//     } else {
//         document.getElementById('submit').disabled = true;
//         alert ("password doesn't match")
//     }
// }


let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
