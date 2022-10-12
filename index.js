// import "./Javascript/Consultations.js"

function ouvrirInfos(id) {
    let infos = document.getElementsByClassName("infos")
    for (let i=0; i < infos.length; i++) {
        if(i != id)
            infos[i].style.display = "none";
        document.getElementsByClassName("plusInfos")[i].style.display = "block";
    }

    document.getElementsByClassName("plusInfos")[id].style.display = "none";
    document.getElementById(id).style.display = "block";

}

function confirmationDelete(id, nomPatient) {
    document.getElementById("suppression").value = id;
    document.getElementById("nomPatient").innerHTML ="Êtes-vous sûr de vouloir supprimer le patient " + nomPatient + " ?";
}

function deleteRow(table) {
    const id = document.getElementById("suppression").value;
    if(id != " ") {
        deleteApi(id, table)
    }
}

function deleteApi(id, table) {
    const API_KEY = "keyoVQjZ08H4oQBSO";
    const URL = `https://api.airtable.com/v0/appMxtIo1QNXAobOO/`  + table + `/` + id + `?api_key=${API_KEY}`;

    const header = {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json'},
    }

    fetch(URL, header)
        .then((response) => {
            console.log(response);
            if(response.ok) {
                // Tout s'est bien passé, on a reçu une réponse
                // On récupère les données
                location.reload();
                response.json().then((data) => {
                    console.log(data)
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}
