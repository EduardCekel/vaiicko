var pocetObjednavok = 0;
class Pocitaj
{
    constructor() {
        try {
            this.pocitaj();
        } catch (e)
        {}
    }

    async pocitaj()
    {
        try {
            let response = await fetch("?c=orders&a=checkObj");
            let data = await response.json();
            var pocet = 0;
            data.orders.forEach((order) => {
                pocet++;
            });
            pocetObjednavok = pocet;
        }
        catch (e)
        {}
    }
}

class NewObj 
{
    constructor() {
        try {
            this.checkNoveObj();
            //document.getElementById("submitObjednavka").onclick = () => 
        } catch (e)
        {}
        setInterval(() => {
            this.checkNoveObj()
        }, 1000);
    }

    async checkNoveObj()
    {
        try {
            console.log("1");
            let response = await fetch("?c=orders&a=checkObj");
            console.log("2");
            let data = await response.json();
            let responseUsers = await fetch("?c=auth&a=regg");
            console.log("3");
            let dataUsers = await responseUsers.json();
            let list = document.getElementById("oznamObj");
            var pocet = 0;
            data.orders.forEach((order) => {
                pocet++;
            });
            var text;
            if (pocet > pocetObjednavok)
            {
                pocetObjednavok++;
                console.log("novy div");
                let link = document.createElement("div");
                link.className = "row";
                link.style.height = "80px";

                let num = document.createElement("div");
                num.className = "col-2";
                num.innerText = pocetObjednavok;
                num.style.fontWeight = "bold";
                link.appendChild(num);

                let datum = document.createElement("div");
                datum.className = "col-3";
                datum.innerText = data.orders[pocetObjednavok - 1].datum;
                link.appendChild(datum);

                let menoPriezvisko = document.createElement("div");
                menoPriezvisko.className = "col-2";

                dataUsers.users.forEach((user) => {
                    if (user.id == data.orders[pocetObjednavok - 1].id_user)
                    {
                        text = user.meno + " " + user.priezvisko;
                    }
                });

                menoPriezvisko.innerText = text;
                link.appendChild(menoPriezvisko);

                let divZobraz = document.createElement("div");
                divZobraz.className = "col-3";

                let butZobraz = document.createElement("a");
                text = "?c=orders&a=zobraz&id="+data.orders[pocetObjednavok - 1].id
                butZobraz.href = text;
                butZobraz.className = "btn btn-info";
                butZobraz.innerText = "Zobraziť detaily";
                divZobraz.appendChild(butZobraz);
                link.appendChild(divZobraz);

                let divDelete = document.createElement("div");
                divDelete.className = "col-2";

                let butDelete = document.createElement("a");
                text = "?c=orders&a=delete&id="+data.orders[pocetObjednavok - 1].id;
                butDelete.href = text;
                butDelete.className = "btn btn-danger";
                butDelete.innerText = "Odstraniť";
                divDelete.appendChild(butDelete);
                link.appendChild(divDelete);

                let ciara = document.createElement("hr");
                ciara.style.margin = 0;
                link.appendChild(ciara);
                console.log("novy div");
                list.appendChild(link);
                //list.appendChild(document.createElement('br'));
            }
            
        }
        catch (e)
        {}
    }
}

var newobj;
var poc;

document.addEventListener(
    'DOMContentLoaded', () => {
        poc = new Pocitaj();
        newobj = new NewObj();
    }, false)
;