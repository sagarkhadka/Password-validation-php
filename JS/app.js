// Java Script to show password meter

const indicator = document.querySelector(".indicator")
const password = document.querySelector("#password")
const weak = document.querySelector(".weak")
const medium = document.querySelector(".medium")
const strong = document.querySelector(".strong")

let regExpWeak = /[a-z]/
let regExpMedium = /\d+/
let regExpStrong = /.[!, @, #, $, %, &, *, ?, _, ~, (, )]/

function trigger() {
    if(password.value != "") {
        indicator.style.display = 'block';
        indicator.style.display = 'flex';
        if(password.value.length <= 3 && (password.value.match(regExpWeak) || password.value.match(regExpMedium) || password.value.match(regExpStrong)))no=1;
        
        if(password.value.length >= 6 && ((password.value.match(regExpWeak) && password.value.match(regExpMedium)) || (password.value.match(regExpMedium) && password.value.match(regExpStrong)) || (password.value.match(regExpWeak) && password.value.match(regExpStrong))))no=2;
        
        if(password.value.length >= 8 && password.value.match(regExpWeak) && password.value.match(regExpMedium) && password.value.match(regExpStrong))no=3;
        
        if (no == 1) {
            weak.classList.add("active")
        }

        if (no == 2) {
            medium.classList.add("active")
        }
        else {
            medium.classList.remove("active")
        }

        if (no==3) {
            weak.classList.add("active")
            medium.classList.add("active")
            strong.classList.add("active")
        }
        else {
            strong.classList.remove("active")
        }
    }
    else {
        indicator.style.display = "none"
        showBtn.style.display = "none";
    }
};