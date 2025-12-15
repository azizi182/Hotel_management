var detailpanel = document.getElementById("guestdetailpanel");

adduseropen = () => {
    detailpanel.style.display = "flex";
}
adduserclose = () => {
    detailpanel.style.display = "none";
}

//search bar logic using js
const searchFun = () =>{
    let filter = document.getElementById('search_bar').value.toUpperCase();

    let myTable = document.getElementById("table-data");

    let tr = myTable.getElementsByTagName('tr');

    for(var i = 0; i< tr.length;i++){
        let td = tr[i].getElementsByTagName('td')[1];

        if(td){
            let textvalue = td.textContent || td.innerHTML;

            if(textvalue.toUpperCase().indexOf(filter) > -1){
                tr[i].style.display = "";
            }else{
                tr[i].style.display = "none";
            }
        }
    }

}

function nextStep() {
    document.getElementById("step1").classList.remove("active");
    document.getElementById("step2").classList.add("active");
}

function prevStep() {
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
}

function closeForm() {
    detailpanel.style.display = "none";
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
}