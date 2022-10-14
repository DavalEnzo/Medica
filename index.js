const API_KEY = "keyoVQjZ08H4oQBSO"

// fonction pour récupérer les informations dans AirTable
function getApiView(id, table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `/` + id + `?api_key=${API_KEY}`
}

function getApiTable(table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `?api_key=${API_KEY}`
}

// récupérer les différents Headers
function getHeaderPatch(data) {
    return {
        method: "PATCH",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    }
}

function getHeaderPost(data) {
    return {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    }
}

function getHeaderGet() {
    return {
        method: "GET",
        headers: {"Content-Type": "application/json"},
    }
}

function getHeaderDelete() {
    return {
        method: "DELETE",
        headers: {"Content-Type": "application/json"},
    }
}

function checkError(array) {
    let error = 0

    for (let i=0; i < array.length; i++)
    {
        if (array[i].value === "") {
            error++;
            document.getElementById(array[i].id + 'Error').innerHTML = '* Champ invalide';
        } else {
            document.getElementById(array[i].id + 'Error').innerHTML = '';
        }
    }

    return error
}

function resetError(array) {
    let error = 0
    for (let i=0; i < array.length; i++)
    {
        document.getElementById(array[i].id + 'Error').innerHTML = '';
    }

    return error
}

// Fonction faisant l'appel
function fetchApi(table, data, header) {
    const URL = getApiTable(table)

    fetch(URL, header)
        .then((response) => {
            console.log(response);
            if (response.ok) {
                response.json().then((data) => {
                    location.reload();
                })
            } else {
                console.log(response);
            }
        }).catch((e) => {
        console.log(e)
    })
}

// les fonctions spécifiques aux tables

//CONSULTATION
function getApiConsultation(id, table) {
    let array = [
        document.getElementById("patientName"),
        document.getElementById("doctorName"),
        document.getElementById("dateTime"),
        document.getElementById("time"),
    ]

    resetError(array)

    if (id) {

        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if (response.ok) {
                    response.json().then((data) => {
                        let date = new Date(data["fields"]["Date"]);
                        let year = date.getFullYear();
                        let month = date.getMonth() + 1;
                        let dt = date.getDate();
                        let hours = date.getUTCHours();
                        let minutes = date.getMinutes();

                        if (dt < 10) {
                            dt = "0" + dt;
                        }
                        if (month < 10) {
                            month = "0" + month;
                        }
                        if (hours < 10) {
                            hours = "0" + hours;
                        }
                        if (minutes < 10) {
                            minutes = "0" + minutes;
                        }
                        document.getElementById("consultationTitle").innerHTML = "Modifier la consultation du patient";
                        document.getElementById("consultationButton").textContent = "Modifier"
                        document.getElementById("consultationButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        document.getElementById("patientName").value = data["fields"]["Patient"][0];
                        document.getElementById("doctorName").value = data["fields"]["Doctor"][0];
                        document.getElementById("dateTime").value = year + "-" + month + "-" + dt;
                        document.getElementById("time").value = hours + ":" + minutes;
                        document.getElementById("consultationId").value = id;
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) => {
            console.log(e)
        })
    } else {
        document.getElementById("consultationTitle").innerHTML = "Créer une consultation";
        document.getElementById("consultationButton").textContent = "Créer"
        document.getElementById("consultationButton").className = "text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
        document.getElementById("patientName").value = "";
        document.getElementById("doctorName").value = "";
        document.getElementById("dateTime").value = "";
        document.getElementById("time").value = "";
        document.getElementById("consultationId").value = null;
    }
}

function validationConsultation(table) {
    let array = [
        document.getElementById("patientName"),
        document.getElementById("doctorName"),
        document.getElementById("dateTime"),
        document.getElementById("time"),
    ]
    let patient = document.getElementById("patientName").value;
    let docteur = document.getElementById("doctorName").value;
    let date = document.getElementById("dateTime").value;
    let time = document.getElementById("time").value;
    let id = document.getElementById("consultationId").value;

    if (0 < checkError(array)) {
        return;
    }

    let data = {};

    if (id !== "") {
        // update
        data = {
            "records": [
                {
                    "id": id,
                    "fields": {
                        "Patient": [patient],
                        "Doctor": [docteur],
                        "Date": date + "T" + time + ":00.000Z",
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPatch(data))
    } else {
        data = {
            // create
            "records": [
                {
                    "fields": {
                        "Patient": [patient],
                        "Doctor": [docteur],
                        "Date": date + "T" + time + ":00.000Z",
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}


//JOB
function getApiJob(id, table) {

    if (id) {
        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if (response.ok) {
                    response.json().then((data) => {
                        document.getElementById("jobTitle").innerHTML = "Modification du métier";
                        document.getElementById("jobButton").textContent = "Modifier"
                        document.getElementById("jobButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        document.getElementById("jobName").value = data["fields"]["Name"];
                        document.getElementById("jobId").value = id;
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) => {
            console.log(e)
        })
    } else {
        document.getElementById("jobTitle").innerHTML = "Création d'un métier";
        document.getElementById("jobButton").textContent = "Créer"
        document.getElementById("jobButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        document.getElementById("jobName").value = "";
        document.getElementById("jobId").value = null;
    }
}

function validationJob(table) {
    let array = [
        document.getElementById("jobName"),
    ]
    let name = document.getElementById("jobName").value;
    let id = document.getElementById("jobId").value;

    if (0 < checkError(array)) {
        return;
    }

    let data = {};

    if (id !== "") {
        data = {
            // update
            "records": [
                {
                    "id": id,
                    "fields": {
                        "Name": name,
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPatch(data))
    } else {
        data = {
            // create
            "records": [
                {
                    "fields": {
                        "Name": name,
                        "Doctor": []
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}


// DOCTOR
function getApiDoctor(id, table) {

    if (id) {
        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if (response.ok) {
                    response.json().then((data) => {
                        console.log(data);
                        document.getElementById("docteurTitle").innerHTML = "Modifier le docteur";
                        document.getElementById("docteurButton").textContent = "Modifier"
                        document.getElementById("docteurButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        document.getElementById("DoctorFirstname").value = data["fields"]["Firstname"];
                        document.getElementById("DoctorLastname").value = data["fields"]["Lastname"];
                        data["fields"]["Jobs"].forEach(element =>
                            document.getElementById(element).checked = true
                        )

                        document.getElementById("DoctorId").value = id
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) => {
            console.log(e)
        })
    } else {
        document.getElementById("docteurTitle").innerHTML = "Créer le docteur";
        document.getElementById("docteurButton").textContent = "Créer"
        document.getElementById("docteurButton").className = "text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
        document.getElementById("DoctorFirstname").value = "";
        document.getElementById("DoctorLastname").value = "";

        job = document.getElementsByClassName("job-checkbox");
        for (let i = 0; i < job.length; i++) {
            job[i].checked = false
        }
        document.getElementById("DoctorId").value = null
    }
}

function validationDoctor(table) {
    let array = [
        document.getElementById("DoctorFirstname"),
        document.getElementById("DoctorLastname"),
    ]

    let jobs = document.getElementsByClassName("job-checkbox");
    let id = document.getElementById("DoctorId").value;
    let firstname = document.getElementById("DoctorFirstname").value;
    let lastname = document.getElementById("DoctorLastname").value;
    let jobsUpdate = [];

    if (0 < checkError(array)) {
        return;
    }

    for (let i = 0; i < jobs.length; i++) {
        if (jobs[i].checked) {
            jobsUpdate.push(jobs[i].id)
        }
    }
    let data = {}
    if (id !== "") {
        data = {
            "records": [
                {
                    "id": id,
                    "fields": {
                        "Jobs": jobsUpdate,
                        "Lastname": lastname,
                        "Firstname": firstname,
                    }
                },
            ]
        }
        fetchApi(table, data, getHeaderPatch(data))
    } else {
        data = {
            "records": [
                {
                    "fields": {
                        "Jobs": jobsUpdate,
                        "Lastname": lastname,
                        "Firstname": firstname,
                    }
                },
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }

}


//MALADIE
function getApiDisease(id, table) {
    let array = [
        document.getElementById("DiseaseName"),
        document.getElementById("DiseaseDescription"),
    ]

    resetError(array);

    if (id) {
        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if(response.ok) {
                    response.json().then((data) => {
                        document.getElementById("DiseaseTitle").innerHTML = "Modifier la Maladie";
                        document.getElementById("DiseaseButton").textContent = "Modifier" ;
                        document.getElementById("DiseaseButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800";
                        document.getElementById("DiseaseName").value = data['fields']['Name'];
                        document.getElementById("DiseaseDescription").value = data['fields']['Description'];
                        document.getElementById('DiseaseId').value = id
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) =>{
            console.log(e)
        })
    } else {
        document.getElementById("DiseaseTitle").innerHTML = "Création d'une Maladie";
        document.getElementById("DiseaseButton").textContent = "Créer";
        document.getElementById("DiseaseButton").className = "text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" ;
        document.getElementById("DiseaseName").value = "";
        document.getElementById("DiseaseDescription").value = "";
        document.getElementById('DiseaseId').value = id
    }
}

function validationDisease(table) {
    array = [
        document.getElementById('DiseaseName'),
        document.getElementById('DiseaseDescription'),
    ]

    if (0 < checkError(array)) {
        return;
    }

    let name = document.getElementById('DiseaseName').value;
    let description = document.getElementById('DiseaseDescription').value;
    let id = document.getElementById('DiseaseId').value;

    let data = {};

    if (id !== '') {
        data = {
            // update
            "records": [
                {
                    "id": id,
                    "fields": {
                        "Name": name,
                        "Description": description,
                    }
                },
            ]
        }
        fetchApi(table, data, getHeaderPatch(data))
    } else {
        data = {
            // create
            'records': [
                {
                    "fields": {
                        "Name": name,
                        "Description": description,
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}

//PATIENT
function getApiPatient(id, table) {
    let array = [
        document.getElementById("PatientAge"),
        document.getElementById("PatientBlood"),
        document.getElementById('PatientCity'),
        document.getElementById('PatientCountry'),
        document.getElementById('PatientEmail'),
        document.getElementById('PatientFirstname'),
        document.getElementById('PatientLastname'),
        document.getElementById('PatientPhone'),
    ]

    resetError(array)

    if (id) {
        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if(response.ok) {
                    response.json().then((data) => {

                        document.getElementById("PatientTitle").innerHTML = "Modification d'un Patient";
                        document.getElementById("PatientButton").textContent = "Modifier";
                        document.getElementById("PatientButton").className = "text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" ;

                        document.getElementById("PatientAge").value = data['fields']['Age'];
                        document.getElementById("PatientBlood").value = data['fields']['Blood_type'];
                        document.getElementById('PatientCity').value = data['fields']['City'];
                        document.getElementById('PatientCountry').value = data['fields']['Country'];
                        document.getElementById('PatientEmail').value = data['fields']['Email'];
                        document.getElementById('PatientFirstname').value = data['fields']['Firstname'];
                        document.getElementById('PatientLastname').value = data['fields']['Lastname'];
                        document.getElementById('PatientPhone').value = data['fields']['Phone'];
                        data['fields']['Diseases'].forEach(element =>
                            document.getElementById(element).checked = true
                        )
                        document.getElementById('PatientId').value = id
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) =>{
            console.log(e)
        })
    } else {
        document.getElementById("PatientTitle").innerHTML = "Création d'un Patient";
        document.getElementById("PatientButton").textContent = "Créer";
        document.getElementById("PatientButton").className = "text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" ;
        document.getElementById("PatientAge").value = '';
        document.getElementById("PatientBlood").value = '';
        document.getElementById('PatientCity').value = '';
        document.getElementById('PatientCountry').value = '';
        document.getElementById('PatientEmail').value = '';
        document.getElementById('PatientFirstname').value = '';
        document.getElementById('PatientLastname').value = '';
        document.getElementById('PatientPhone').value = '';
        let diseases = document.getElementsByClassName('disease-checkbox');

        for (let i=0; i < diseases.length; i++)
        {
            diseases[i].checked = false
        }
    }
}

function validationPatient(table) {
    let array = [
        document.getElementById("PatientAge"),
        document.getElementById("PatientBlood"),
        document.getElementById('PatientCity'),
        document.getElementById('PatientCountry'),
        document.getElementById('PatientEmail'),
        document.getElementById('PatientFirstname'),
        document.getElementById('PatientLastname'),
        document.getElementById('PatientPhone'),
    ]

    let age = document.getElementById("PatientAge").value;
    let blood = document.getElementById("PatientBlood").value;
    let city = document.getElementById("PatientCity").value;
    let country = document.getElementById("PatientCountry").value;
    let email = document.getElementById("PatientEmail").value;
    let diseases = document.getElementsByClassName("patient-checkbox");
    let firstname = document.getElementById("PatientFirstname").value;
    let lastname = document.getElementById("PatientLastname").value;
    let phone = document.getElementById("PatientPhone").value;
    let id = document.getElementById("PatientId").value;

    let diseasesUpdate = [];

    for (let i = 0; i < diseases.length; i++) {
        if (diseases[i].checked) {
            diseasesUpdate.push(diseases[i].id)
        }
    }

    if (0 < checkError(array)) {
        return;
    }

    const URL = getApiTable(table)


    let data = {}

    if (id !== '') {
        data = {
            // update
            "records": [
                {
                    "id": id,
                    "fields": {
                        "Age": age,
                        "Blood_type": blood,
                        "City": city,
                        "Country": country,
                        "Diseases": diseasesUpdate,
                        "Email": email,
                        "Firstname": firstname,
                        "Lastname": lastname,
                        "Phone": phone,
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPatch(data))
    } else {
        data = {
            // create
            'records': [
                {
                    "fields": {
                        "Age": age,
                        "Blood_type": blood,
                        "City": city,
                        "Country": country,
                        "Diseases": diseasesUpdate,
                        "Email": email,
                        "Firstname": firstname,
                        "Lastname": lastname,
                        "Phone": phone,
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}


//delete
function deleteRow(table) {
    const id = document.getElementById("suppression").value;
    if (id != " ") {
        deleteApi(id, table)
    }
}

function deleteApi(id, table) {
    const API_KEY = "keyoVQjZ08H4oQBSO";
    const URL = `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `/` + id + `?api_key=${API_KEY}`;

    fetch(URL, getHeaderDelete())
        .then((response) => {
            console.log(response);
            if (response.ok) {
                location.reload();
            } else {
                console.log(response);
            }
        }).catch((e) => {
        console.log(e)
    })
}

function confirmationDeleteConsultation(id) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML = "Êtes-vous sûr de vouloir supprimer cette consultation ?";
}

function confirmationDeleteJob(id, nomJob) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML = "Êtes-vous sûr de vouloir supprimer le métier " + nomJob + " ?";
}

function confirmationDeleteDoctor(id, nomDoctor) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML = "Êtes-vous sûr de vouloir supprimer le docteur " + nomDoctor + " ?";
}

function confirmationDeleteDisease(id, nomMaladie) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML = "Êtes-vous sûr de vouloir supprimer la maladie " + nomMaladie + " ?";
}

function confirmationDeletePatient(id, nomPatient) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML = "Êtes-vous sûr de vouloir supprimer le patient " + nomPatient + " ?";
}

