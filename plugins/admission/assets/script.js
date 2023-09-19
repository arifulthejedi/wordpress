


let classSelected = "";
let cls = document.querySelector("#student-class");
let fees = document.querySelector("#admission-fees");
let msg = document.querySelector(".status-msg");
let admissionFees = "";




//selected event trigered
document.querySelector("#student-class-selected").addEventListener("change",()=>{
    classSelected = document.querySelector("#student-class-selected").value
 
    cls.innerHTML = classSelected;
    
    if(classSelected == "Play"){
        fees.innerHTML = "১০০০৳";
        admissionFees = "১০০০৳";
    }
    else if(classSelected == "Nurcery"){
        fees.innerHTML = "২০০০৳";
        admissionFees = "২০০০৳";

    }
    else if(classSelected == "I"){
        fees.innerHTML = "৩০০০৳";
        admissionFees = "৩০০০৳";

    }
    else if(classSelected == "II"){
        fees.innerHTML = "৪০০০৳";
        admissionFees = "৪০০০৳";

    }
    else if(classSelected == "III"){
        fees.innerHTML = "৫০০০৳";
        admissionFees = "৫০০০৳";

    }
    else if(classSelected == "IV"){
        fees.innerHTML = "৫০০০৳";
        admissionFees = "৫০০০৳";

    }
    else{
        fees.innerHTML = "000৳";

    }
    
})


// document.querySelector("#bkash-payment-submit").addEventListener("click",(e)=>{

//    e.preventDefault();

//     let form = document.querySelector("#bkash-payment-plugin form");
//     let nm = document.querySelector("#student-name").value;
//     let age = document.querySelector("#student-age").value;
//     let p = document.querySelector("#p-name").value;
//     let b = document.querySelector("#bkash-num").value;
//     let cl = document.querySelector("#student-class-selected").value;
//     let f = fees.innerHTML;

// //nm && age && parent && classSelected && bkash
//     if(nm && age && p && cl && b){
//         //data validattion
//         let regex = /^[A-Za-z0-9\s]{1,20}$/;

//         if(regex.test(nm) && regex.test(age) && regex.test(p) && regex.test(b)){

//             let data = {
//                 name:nm,
//                 age:age,
//                 parent_name:p,
//                 class:cl,
//                 payment_method:"Bkash",
//                 payment:f,
//             }
            
//           //request to api
//           fetch("http://localhost/wp-json/payment/v1/submit",{
//                 method: 'POST',
//                 headers: {
//                   'Content-Type': 'application/json', // Set the content type to JSON
//                 },
//                 body: JSON.stringify(data), // Convert data to JSON string
//           }).then((res)=> res.json()).then((r)=>{
//             if(r['submit']){
//                 msg.style.color = "green";
//                 msg.innerHTML = "Data submitted successfully"; 
//                 form.reset();
//             }else{
//                 msg.innerHTML = "Something went wrong plaease try again";
//                 form.reset();
 
//             }
//           })
        
//         }
//         else{
//             msg.innerHTML = "Please fill valid data type"; 
//         }

//         }
//     else{
//      msg.innerHTML = "All required filed must be filled";
//     }   
// })



//redirect or bkash
document.querySelector("#bkash-payment-submit").addEventListener("click",(e)=>{
    let body = {
        app_key:"7epj60ddf7id0chhcm3vkejtab",
        app_secret:"18mvi27h9l38dtdv110rq5g603blk0fhh5hg46gfb27cp2rbs66f",
   };

let req = {
   method:"POST",
   headers:{
       'Content-Type': 'application/json',
       'accept': 'application/json',
       'username':"sandboxTokenizedUser01",
       'password':"sandboxTokenizedUser12345",
   },
   body:JSON.stringify(body)
}


fetch("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant",req).then((res) => res.json()).then(
  (data)=>{
   localStorage.setItem('token', JSON.stringify(data));
   console.log(data)
  } 
).catch((err)=>{
   console.log(err);
})
})


//after getting confirmation redired to this page

//make status msg admission succesfull

