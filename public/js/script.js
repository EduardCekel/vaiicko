class Reg {
    constructor() {
        try {
            this.checkEmail();
        } catch (e)
        {}

        setInterval(() => {
            this.checkEmail()
        }, 1000);
        
    }

    async checkEmail() {
        try {
            let login = document.getElementById("loginReg");
            let lastname = document.getElementById("lastNameReg");
            let email = document.getElementById("emailReg");
            let pass1 = document.getElementById("passwordReg1");
            let pass2 = document.getElementById("passwordReg2");
            let response = await fetch("?c=auth&a=regg");
            let data = await response.json();
            let exist = false;
            data.users.forEach((user) => {
                if (user.email == email.value)
                {
                    exist = true;
                }
            });
            if (login.value == "" || lastname.value == "" || email.value == "")
            {
                document.getElementById("vypisReg").innerText = "";
            }
            else if(login.value.length < 3)
            {
                document.getElementById("vypisReg").innerText = "Dlzka mena musi byt min. 3 znaky";
            }
            else if(lastname.value.length < 3)
            {
                document.getElementById("vypisReg").innerText = "Dlzka priezviska musi byt min. 3 znaky";
            }
            else if (!email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
            {
                document.getElementById("vypisReg").innerText = "Neplatný format emailu!";
            }
            else if (exist)
            {
                document.getElementById("vypisReg").innerText = "Zadaný email používa iný používateľ!";
            }
            else if (pass1.value == "")
            {
                document.getElementById("vypisReg").innerText = "";
            }
            else if(pass1.value.length < 8)
            {
                document.getElementById("vypisReg").innerText = "Dlzka hesla musi byt min. 8 znaky";
            }
            else if (pass1.value != pass2.value)
            {
                document.getElementById("vypisReg").innerText = "Heslá sa nezhodujú!";
            }
            else
            {
                document.getElementById("vypisReg").innerText = "";
                document.getElementById("buttonReg").disabled = false;
            }
        } catch (e)
        {}
    }

}

class Objednavka 
{
    constructor() {
        try {
            this.checkObjedavku();
            //document.getElementById("submitObjednavka").onclick = () => 
        } catch (e)
        {}
        setInterval(() => {
            this.checkObjedavku()
        }, 1000);
    }

    async checkObjedavku()
    {
        try {
            document.getElementById("submitObjednavka").disabled  = true;
            let info = document.getElementById("objInfo");
            var vyber = document.getElementsByName("vyberKrabice");
            
            for(let i = 0; i < 6; i++) {
                //console.log(vyber[i].chcecked);
                if(vyber[i].checked == true)
                 { 
                    document.getElementById("submitObjednavka").disabled  = false;
                }
            }
        }
        catch (e)
        {}
    }
}

var rag;
var obj;

document.addEventListener(
    'DOMContentLoaded', () => {
        rag = new Reg();
        obj = new Objednavka();
    }, false)
;