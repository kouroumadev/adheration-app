        // var currentTab = 0; // Current tab is set to be the first tab (0)
        // showTab(currentTab); // Display the current tab

        // function showTab(n) {
        //   // This function will display the specified tab of the form...
        //   var x = document.getElementsByClassName("step");
        //   x[n].style.display = "block";
        //   //... and fix the Previous/Next buttons:
        //   if (n == 0) {
        //     document.getElementById("prevBtn").style.display = "none";
        //   } else {
        //     document.getElementById("prevBtn").style.display = "inline";
        //   }
        //   if (n == (x.length - 1)) {
        //     document.getElementById("nextBtn").innerHTML = "Submit";
        //   } else {
        //     document.getElementById("nextBtn").innerHTML = "Next";
        //   }
        //   //... and run a function that will display the correct step indicator:
        //   fixStepIndicator(n)
        // }

        // function nextPrev(n) {
        //   // This function will figure out which tab to display
        //   var x = document.getElementsByClassName("step");
        //   // Exit the function if any field in the current tab is invalid:
        //   if (n == 1 ) return false;
        //   // Hide the current tab:
        //   x[currentTab].style.display = "none";
        //   // Increase or decrease the current tab by 1:
        //   currentTab = currentTab + n;
        //   // if you have reached the end of the form...
        //   if (currentTab >= x.length) {
        //     // ... the form gets submitted:
        //     document.getElementById("signUpForm").submit();
        //     return false;
        //   }
        //   // Otherwise, display the correct tab:
        //   showTab(currentTab);
        // }

        // function validateForm() {
        //   // This function deals with validation of the form fields
        //   var x, y, i, valid = true;
        //   x = document.getElementsByClassName("step");
        //   y = x[currentTab].getElementsByTagName("input");
        //   // A loop that checks every input field in the current tab:
        //   for (i = 0; i < y.length; i++) {
        //     // If a field is empty...
        //     if (y[i].value == "") {
        //       // add an "invalid" class to the field:
        //       y[i].className += " invalid";
        //       // and set the current valid status to false
        //       valid = false;
        //     }
        //   }
        //   // If the valid status is true, mark the step as finished and valid:
        //   if (valid) {
        //     document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
        //   }
        //   return valid; // return the valid status
        // }

        function fixStepIndicator(n) {
          // This function removes the "active" class of all steps...
          var i, x = document.getElementsByClassName("stepIndicator");
          for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
          }
          //... and adds the "active" class on the current step:
          x[n].className += " active";
        }


/////////////////////// Wrapper wizard /////////////////////////////////
const multiStepFormWrapper = document.querySelector('[data-multi-step-wrap');
const formStepsWrapper = [...multiStepFormWrapper.querySelectorAll('[data-step-global]')];


let currentStepWrapper = formStepsWrapper.findIndex(step =>{
        return step.classList.contains("active-global")
    })

    if (currentStepWrapper < 0) {
        currentStepWrapper = 0;
        formStepsWrapper[currentStepWrapper].classList.add("active-global");

        fixStepIndicator(currentStepWrapper)
        showCurrentStepWrapper()
    }

multiStepFormWrapper.addEventListener('click', e =>{
    let incrementor;

    if (e.target.matches("[data-next-global]")) {
        incrementor =1

    }
    else if (e.target.matches("[data-previous-global]")) {
        incrementor = -1
    }
    if (incrementor == null) {
        return
    }

    const inputs = [...formStepsWrapper[currentStepWrapper].querySelectorAll("input")]
    const allValid = inputs.every(input => input.reportValidity())
    if(allValid){
        currentStepWrapper += incrementor
        showCurrentStepWrapper()
        fixStepIndicator(currentStepWrapper)
    }
    //  console.log(currentStepWrapper)


})

function showCurrentStepWrapper(){
    formStepsWrapper.forEach((step, index) => {
        step.classList.toggle("active-global", index === currentStepWrapper)

    })


}

      ///////////////////////////////// AFFILIATION   //////////////////////////////////////
// const multiStepFormAffiliation = document.querySelector('[data-multi-step-affiliation');
// const formStepsAffiliation = [...multiStepFormAffiliation.querySelectorAll('[data-step-affiliation]')];

// let currentStep = formStepsAffiliation.findIndex(step =>{
//         return step.classList.contains("active-affiliation")
//     })

//     if (currentStep < 0) {
//         currentStep = 0;
//         formStepsAffiliation[currentStep].classList.add("active-affiliation");


//         showCurrentStep()
//     }

//     multiStepFormAffiliation.addEventListener('click', e =>{
//     let incrementor;

//     if (e.target.matches("[data-next-affiliation]")) {
//         incrementor =1

//     }
//     else if (e.target.matches("[data-previous-affiliation]")) {
//         incrementor = -1
//     }
//     if (incrementor == null) {
//         return
//     }

//     const inputs = [...formStepsAffiliation[currentStep].querySelectorAll("input")]
//     const allValid = inputs.every(input => input.reportValidity())
//     if(allValid){
//         currentStep += incrementor
//         showCurrentStep()

//     }
//     //  console.log(currentStep)


// })

// function showCurrentStep(){
//     formStepsAffiliation.forEach((step, index) => {
//         step.classList.toggle("active-affiliation", index === currentStep)

//     })


// }

