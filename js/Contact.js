const firebaseConfig = {
    apiKey: "AIzaSyBt4qXLpkf_cf5jHLgShG3wcQoX2xdufWA",
    authDomain: "portfoliocontact-85ccc.firebaseapp.com",
    databaseURL: "https://portfoliocontact-85ccc-default-rtdb.firebaseio.com",
    projectId: "portfoliocontact-85ccc",
    storageBucket: "portfoliocontact-85ccc.appspot.com",
    messagingSenderId: "457173036118",
    appId: "1:457173036118:web:d53a75e9166e4894665ff7",
    measurementId: "G-65XMS8W7EG"
  };

  // initialize firebase
firebase.initializeApp(firebaseConfig);

// reference your database

var PortfolioContactDB = firebase.database().ref("PortfolioContact");

document.getElementById("PortfolioContact").addEventListener("submit", submitForm);

function submitForm(e) {
    e.preventDefault();
  
    var name = getElementVal("userName");
    var emailid = getElementVal("userEmail");
    // console.log(name, emailid);
    saveMessages(name, emailid);
  
    //   enable alert
    document.querySelector(".alert").style.display = "block";
  
    //   remove the alert
    setTimeout(() => {
      document.querySelector(".alert").style.display = "none";
    }, 3000);
  
    //   reset the form
    document.getElementById("PortfolioContact").reset();
  }
  
  const saveMessages = (name, emailid) => {
    var newContactForm = PortfolioContactDB.push();
  
    newContactForm.set({
      name: name,
      emailid: emailid,
    });
  };
  
  const getElementVal = (id) => {
    return document.getElementById(id).value;
  };