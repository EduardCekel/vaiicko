class Password 
{
    constructor() {
        try {
            this.checkPassword();
            this.checkAddress();
        } catch (e)
        {}
        setInterval(() => {
            this.checkPassword()
            this.checkAddress();
        }, 1000);
    }

    async checkPassword()
    {
        try {
            document.getElementById("submit").disabled  = true;
            let heslo1 = document.getElementById("heslo");
            let heslo2 = document.getElementById("heslo2");
            if (heslo1.value == "")
            {
                document.getElementById("vypis").innerText = "";
            }
            else if (heslo1.value.length < 8)
            {
                document.getElementById("vypis").innerText = "Minimálna dĺžka hesla je 8 znakov!";
            }
            else if (heslo1.value != heslo2.value)
            {
                document.getElementById("vypis").innerText = "Heslá sa nezhodujú!";
            } else {
                document.getElementById("vypis").innerText = "";
                document.getElementById("submit").disabled  = false;
            }
        }
        catch (e)
        {}
    }

    async checkAddress()
    {
        try {
            document.getElementById("submitZmena").disabled  = true;
            let adresa = document.getElementById("adresa");
            let psc = document.getElementById("psc");
            let mesto = document.getElementById("mesto");
            let tel = document.getElementById("tel");
            if (adresa.value == "" || psc.value == "" || mesto.value == "" || tel.value == "")
            {
                document.getElementById("vypis").innerText = "";
            } else if ( psc.value.length != 5 )
            {
                document.getElementById("vypis").innerText = "PSČ obsahuje 5 číslic!";
            } else if (isNaN(psc.value))
            {
                document.getElementById("vypis").innerText = "PSČ musí byť číslo!";
            } else if (tel.value.length != 10)
            {
                document.getElementById("vypis").innerText = "Tel. číslo musí obsahovať 10 číslic!";
            } else if (isNaN(tel.value))
            {
                document.getElementById("vypis").innerText = "Tel. číslo musí byť číslo!";
            }
            else {
                document.getElementById("vypis").innerText = "";
                document.getElementById("submitZmena").disabled  = false;
            }
        }
        catch (e)
        {}
    }
}

var pass;

document.addEventListener(
    'DOMContentLoaded', () => {
        pass = new Password();
    }, false)
;