/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function formhash(form, password) {
    //create a new element input, this will be hashed password for field.
    var pas = document.createElement("input");

    //add new element to form
    form.appendChild(pas);
    pas.name = "pas";
    pas.type = "hidden";
    pas.value = hex_sha512(password.value);

    //make sure the plaintext password doesn't get sent
    password.value = "";

    //finally submit the form
    form.submit();
}



