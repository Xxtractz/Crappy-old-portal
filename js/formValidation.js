let errs;
let pass_err;
let conf_err;
conf_err = [];
pass_err = [];
errs = [];

const form = document.getElementById('form');
const form_err = document.getElementById("err_form");
form.addEventListener('submit', (e) =>{
    if(errs.length > 0 || pass_err.length > 0 || conf_err.length > 0) {
        e.preventDefault()
        form_err.innerText = "You Have errors in your form";
    }
    else{
        form_err.innerText = "";
    };
});


// ID Validation This is for South African ID No. only(I think)
function id_Valid(){
    const id = document.getElementById("id_input");
    const id_err = document.getElementById("err_id");

    const ex = /^(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(( |-)(\d{4})( |-)(\d{3})|(\d{7}))/;

    if(id.value.length === 13 || id.value.length === 0 ){
        id_err.innerText = "";
    }
    if(id.value.length != 13){
        id_err.innerText = "SA ID's are 13 Characters long \n";
        errs = " length";
    }
    if (!(id.value.match(/^[0-9]*$/g))){
        id_err.innerText += "Only numeric Values\n";
        errs += " num";
    }
    if(!(id.value.toString().match(ex))){
        id_err.innerText += "invalid SA ID format";
        errs += " format";
    }
    if( id.value.length === 0 || (id.value.length === 13 && (id.value.toString().match(ex)) && (id.value.match(/^[0-9]*$/g)))){
        id_err.innerText = "";
        errs = "";
    }
}

// Password Validation.
function pw_Valid() {
    const password = document.getElementById("id_pw")
    const pw_err = document.getElementById("err_pw");
    const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/g;

    if(password.value.match(pattern)) {
        pass_err = [];
        pw_err.innerText = "";
    }else {
        if(password.value.length >= 8 && password.value.length < 21){
            pw_err.innerText = "";
        } else{
            pw_err.innerText = "Your Password should be 8 - 20 Characters \n";
            pass_err.push("length");
        }
        if(password.value.match(/[a-z]/g) ){
            pw_err.innerText += "";
        }else{
            pw_err.innerText += "Must contain a Lower case \n";
            pass_err.push("lcase");
        }
        if(password.value.match(/[A-Z]/g)){
            pw_err.innerText += "";
        } else{
            pw_err.innerText += "Must contain a Upper case \n";
            pass_err.push("Ucase");
        }
        if(password.value.match(/[0-9]/g)){
            pw_err.innerText += "";
        }
        else{
            pw_err.innerText += "Must contain Numeric Value\n";
            pass_err.push("num");
        }
        if(password.value.match(/[~!@#$%^&*)({}[\]|:"<>?]/g)){
            pw_err.innerText += "";
        }
        else{
            pw_err.innerText += "Must contain a Special Character\n";
            pass_err.push("special");
        }
    }
    if(password.value.length === 0 ){
        pw_err.innerText = "";
        pass_err.length = 0;
    }
}

// Confirm password Validation
function cf_Valid() {
    const password = document.getElementById("id_pw");
    const confirm = document.getElementById("id_cf");
    const cf_err = document.getElementById("err_cf");

    if (password.value != confirm.value){
        cf_err.innerHTML = "Password doesn't Match";
        conf_err.push("password");
    }
    else
    {
        cf_err.innerHTML = "";
        conf_err = [];
    }
}

function hide_errs() {
    document.getElementById("error_hide").style.display = "none";
}



