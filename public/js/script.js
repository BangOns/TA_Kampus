const ClassAuth = new Auth();
window.addEventListener('DOMContentLoaded',()=>{
   // Form
   
    
    // Input Value
    const inputIdAdmin = document.querySelector('#id_admin');
    const inputPassword = document.querySelector('.pw');
    const inputRePassword = document.querySelector('.repw');
    // Button
    const viewPass = document.querySelector(".viewPass");
    const viewRePass = document.querySelector(".viewRePass");
    const randomId = document.querySelector(".randomId");
    
 

    viewPass.addEventListener('click',()=>{
       inputPassword.type =  ClassAuth.PasswordViews();   
    })
    viewRePass.addEventListener('click',()=>{
        inputRePassword.type =  ClassAuth.RePasswordViews();
     })
     randomId.addEventListener('click',()=>{
        inputIdAdmin.value =  ClassAuth.RandomId();

     })
})

