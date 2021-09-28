console.log("Script")

const register = './modules/registration.php' // links for php scripts from where we'll get our response
const validate = './modules/validation.php' // links for php scripts from where we'll get our response

const subscribebtn = document.getElementById('subscribe')
const email = document.getElementById('email') // text input for email
const otp = document.getElementById('otp') // text input for otp
const verifyotpbtn = document.getElementById('verifyotp')
//divisions of register & verify otp
const otpform = document.getElementById('otp-form-group')
const emailform = document.getElementById('register-form-group')

//to show error 
const error = document.getElementById('error')
let respstatus = 0; //global variable to record response status
//red-heading
const heading1 = document.getElementById('heading-1')
//uppercase heading
const heading2 = document.getElementById('heading-2')
//lowercase heading
const heading3 = document.getElementById('heading-3')

subscribebtn.addEventListener('click', verifyEmail)
verifyotpbtn.addEventListener('click', verifyOTP)


//this function will return a promise (after fetching data) which inturn needs to be fetched from their respective func
async function request(link, method, body) {
  console.log({
    link,
    method,
    body
  });

  //fetch data
  let response = "";
  body = JSON.stringify(body) // converts a JavaScript object or value to a JSON string
  response = await fetch(
    link, {
      method: method,
      body: body
    }
  );

  // so the fetch returns a promise, what the await keyword does is, it stalls JavaScript
  // from assigning the promise to the response variable, until it has been resolved
  // once the promise has been resolved, the object returned from the promise is assigned

  // console.log(response.json());

  respstatus = response.status;
  // const resp = ;
  return response.json(); // to return the object
  // return {
  //   status: response.status
  // };
}

//whenever we call an async function it returns a promise regardless of what is its contents
async function verifyEmail() {
  // console.log("verifyinggg")

  //client side validation of email
  if (validateEmail(email.value)) {
    let data = await request(register, "POST", {
      email: email.value
    })
    sessionStorage.setItem("email", email.value); // to later access it for otp verification

    // const {
    //   status
    // } = data;

    console.log({
      data
    })
    switch (respstatus) {
      case 200:
        // Enter OTP send to your mail
        OTPVerification()
        break;
      case 202:
        OTPVerification()
        break;
      case 201:
        // Already Registered
        showError("Looks like you are already subscribed. Check your mail for the comics!");
        break;
      case 500:
        // Internal Server Error
        window.location.replace("./error.php?error=" + 500);
        break;
      case 400:
        showError("Looks like you did not enter a valid email address. Please enter a valid email address.");
        break;
      case 409:
        //conflict (already subscribed)
        showError("Looks like you are already subscribed. Check your mail for the comics!");
        break;
      default:
        break;
    }
  } else {

    //enter a valid email address
    showError("Looks like you did not enter a valid email address. Please enter a valid email address.");
  }
}

//function for otp verification
async function verifyOTP() {
  let sesEmail = sessionStorage.getItem('email');



  //client side validation of OTP
  if (validateOTP(otp.value)) {
    let otpdata = await (request(validate, "POST", {
      email: sesEmail,
      otp: otp.value
    }))

    console.log(otpdata['error'])

    switch (respstatus) {
      case 200:
        // Registration Sucessful
        window.location.replace("./subscribe.php?fromURL=" + 0);
        break;
      // case 201: Already Registered
      // case 202: Enter Valid OTP && or OTP doesn't match
      case 404:
        // User Not Found in database
        window.location.replace("./error.php?error=" + 404);
        break;
      case 422:
        // Enter Valid Email
        showError("Looks like you did not enter a valid email address. Please enter a valid email address.");
        break;
      case 500:
        // Internal Server Error
        window.location.replace("./error.php?error=" + 500);
        break;
      default:
        showError(otpdata['error'])
        break;
    }
  } else {
    //enter a valid 6 digit OTP
    showError("Invalid OTP!")
  }


}

//client side OTP validation (checking if all are numbers)
function validateOTP(OTP){
  //using ASCII
  if(OTP.length>0 && OTP.length<=6){
    for (let i = OTP.length - 1; i >= 0; i--) {
      const d = OTP.charCodeAt(i);
      if (d < 48 || d > 57) return false //ASCII Value of 0 - 49, ASCII of 9 - 57
    }
    return true
  }
  return false

  //using regex - let isnum = /^\d+$/.test(val);
}
//email validation
function validateEmail(email) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    return (true)
  }
  return (false)
}

//to show the errors below the text-input
function showError(errorText) {
  error.setAttribute("style", "transform: scale(0.85); opacity:0")
  setTimeout(() => {
    error.textContent = errorText
    error.setAttribute("style", "transform: scale(1); color: #FF5B79; opacity:1")
  }, 500)
}

//OTPVerification verify otp for now -- fix the layout later
function OTPVerification() {
  // otpform.setAttribute = ("style","transform: scale(0.85); opacity:0")


  // otpform.setAttribute = ("style", "display:flex;")

  heading1.setAttribute("style", "opacity:0")
  heading2.setAttribute("style", "opacity:0")
  heading3.setAttribute("style", "opacity:0")
  error.setAttribute("style", "opacity:0")


  setTimeout(() => {
    heading1.textContent = "Security Check!"
    heading2.textContent = "Please enter the OTP sent to your mail"
    heading3.textContent = "We're just trying to make sure that you're not a robot or a friend of Captain Sem."
    error.textContent = "Almost there..."

    emailform.style = "display:none";
    heading1.setAttribute("style", "opacity:1")
    heading2.setAttribute("style", "opacity:1")
    heading3.setAttribute("style", "opacity:1")
    error.setAttribute("style", "opacity:1")
    otpform.style = "display:flex";
  }, 500)
}