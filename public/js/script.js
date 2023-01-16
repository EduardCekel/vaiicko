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
        obj = new Objednavka();
    }, false)
;