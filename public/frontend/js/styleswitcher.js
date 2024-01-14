  /* To load theme style from localStorage setting using changeLanguageLayout    */
window.addEventListener("load", function () {
  let langState = localStorage.getItem("lang");
  loadTheme();
});

//  Language Switcher
const langStyle = document.querySelector(".languages");

//to set the style that coaporate with the language activated
function setLanguageStyle(langName) {
    changeLanguageLayout(langName);
  //to set the language choosen as a local param stored in the browser
    localStorage.setItem("lang", langName);
}

// to check the language that has been choosen to load the appropriate layout interact with language
function changeLanguageLayout(languageName) {
  if (languageName == "arabic") {
    langStyle.removeAttribute("disabled");
  } else {
    langStyle.setAttribute("disabled", true);
    }
    
    let mylangbtns = document.querySelectorAll(".mylang");
    
    mylangbtns.forEach(element => {
        if (element.getAttribute('title') == languageName) {
            element.parentElement.classList.add('active');
            let mainLangBtn = document.querySelector(".mainBtnLang");
            mainLangBtn.textContent = languageName.charAt(0).toUpperCase() + languageName.slice(1);
        } else {
            element.parentElement.classList.remove('active');
        }
    });

   
}

//To active language and layout that been choosed before reload this function called on load
function loadTheme() {
  changeLanguageLayout(localStorage.getItem("lang"));
}
