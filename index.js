// import "./Javascript/Consultations.js"

function ouvrirInfos(id) {
    infos = document.getElementsByClassName("infos")
    for (var i=0; i < infos.length; i++) {
        if(i != id)
            infos[i].style.display = "none";
        document.getElementsByClassName("plusInfos")[i].style.display = "block"
    }

    document.getElementsByClassName("plusInfos")[id].style.display = "none"
    document.getElementById(id).style.display = "block";


}

function showModals(idAirTable, table) {
    let id = idAirTable;
    let Table = table;

    console.log(id, Table);
}
