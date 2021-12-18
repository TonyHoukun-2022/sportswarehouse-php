//activate strict mode in the browser
"use strict"

/*
    recommendation of using rating:

    1. const  block-scoped constant
    2. let      block-scope variable
    3. var     global variable (function scope)
*/

//get reference to the form(from the DOM)
const checkoutForm = document.getElementById("checkout-form")

// check that the form exists (in the current page)
if (checkoutForm) {
  //disable the html5 validation (add the 'novalidate' attribute to the form tag)
  checkoutForm.setAttribute("novalidate", "")

  //Apply validation using the 'submit' event listener
  checkoutForm.addEventListener("submit", (event) => {
    //get references to the form fields
    const firstName = checkoutForm.elements["firstName"]
    const lastName = checkoutForm.elements["lastName"]
    const number = checkoutForm.elements["number"]
    const email = checkoutForm.elements["email"]
    const postcode = checkoutForm.elements["postcode"]
    const question = checkoutForm.elements["question"]
    const categories = checkoutForm.querySelector("#categories")

    //clear all existing error messages (reset the form state)
    hideAllErrors(checkoutForm)

    /*
        Regular expression patterns (regex)
        /.../    is a regex pattern in JS
        ^        start of string (anchor)
        [abc]   any single character in this set
        \d      any single digit, same as [0-9]
        {min, max}      repetition
      */
    const regexPostcode = /^\d{3,4}$/
    //comes from regexemail.com
    const regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    const regexAuNumber = /^((000|112|106)|(((\+61 ?\(?0?[- ]?)|(\(?0[- ]?))[23478]\)?([- ]?[0-9]){8})|((13|18)([- ]?[0-9]){4}|(1300|1800|1900)([- ]?[0-9]){6}))$/

    /*
            validate each form field
            attention: Always check for INVALID data
        */
    //validate first name (2+ chars)
    if (firstName.value.trim().length < 2) {
      showError(firstName, event)
    }

    //validate last name (2+ chars)
    if (lastName.value.trim().length < 2) {
      showError(lastName, event)
    }

    //   validate phone number
    if (number.value != "" && !regexAuNumber.test(number.value)) {
      showError(number, event, "Must be Australian phone numbers")
    }
    //validate email
    if (email.value == "") {
      showError(email, event, "Email is required")
    } else if (email.value != "" && !regexEmail.test(email.value)) {
      showError(email, event, "Must be a valid email address, e.g. user@domain.com")
    }

    //validate postcode (4 digits)
    // australian postcode 0000 ~ 9999 or 3 digits in TAS
    //   regex: /^\d{4}$/  source from regex101.com
    if (postcode.value != "" && !regexPostcode.test(postcode.value)) {
      showError(postcode, event, "Must be 3-4 digits")
    }

    //validate product category preferences (must select at least one option)
    //Find all the checkboxes
    // const cateBoxes = checkoutForm.elements["category[]"]
    // let cateCount = 0
    //OPTION1: Manually loop through the checkboxes
    //Loop through each checkbox
    // for (const cateBox of cateBoxes) {
    //   //Add 1 to the counter if the checkbox has been checked
    //   if (cateBox.checked) cateCount++
    // }
    // //check how many checkboxes have been checked
    // if (cateCount < 1) {
    //   showError(categories, event, "Must choose at least 1 category")
    // }

    //OPTION2: Directly find the checked checkboxes (using a selector)
    if (checkoutForm.querySelectorAll(`input[name="category[]"]:checked`).length < 1) {
      showError(categories, event, "Must choose at least 1 category")
    }

    //validate question (30+ chars)
    if (question.value.trim().length == 0) {
      showError(question, event, "Question is required")
    } else if (question.value.trim().length < 30) {
      showError(question, event, "At least 30 characters")
    }
  })
}

/**
 * Show an error message for an invalid form field
 *
 * @param {Object} field the form field that is invalid
 * @param {Object} event the event object of the form submission
 * @param {string} errorMessage the custom error message
 */
function showError(field, event, errorMessage = null) {
  // if the data is not valid, the form submission should be cancelled.
  //cancel the event(stop the form from submitting)
  event.preventDefault()
  // display error message
  field.parentElement.classList.add("error-row")

  //check if a custom error message is provided
  // ... if not, use the existing span that's already in the DOM
  if (errorMessage) {
    // Find the span.error-message in the DOM
    let errorSpan = field.parentElement.querySelector(".error-message")
    //check if the error span NOT exist, create a new one
    if (!errorSpan) {
      //create span, add class, add to the DOM
      errorSpan = document.createElement("span")
      errorSpan.classList.add("error-message")
      field.parentElement.appendChild(errorSpan)
    }

    //update the error message
    errorSpan.innerText = errorMessage
  }
}

function hideAllErrors(form) {
  //find all elements with the  'error-row' class within the provided form
  const errorRows = form.querySelectorAll(".error-row")
  //loop through each element and remove the 'error-row' class
  //   errorRows.forEach((errorRow) => {
  //     errorRow.classList.remove("error-row")
  //   })
  for (const errorRow of errorRows) {
    errorRow.classList.remove("error-row")
  }
}
