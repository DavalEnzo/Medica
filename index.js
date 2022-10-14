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
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }
}

function getHeaderPost(data) {
    return {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }
}

function getHeaderGet() {
    return {
        method: 'GET',
        headers: { 'Content-Type': 'application/json'},
    }
}

function getHeaderDelete() {
    return {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json'},
    }
}

function checkError(array) {
    console.log(array)
    let error = 0
    for (let i=0; i < array.length; i++)
    {
        console.log(array[i].id);
        if (array[i].value === "") {
            error++;

            document.getElementById(array[i].id + 'Error').innerHTML = '* Champ invalide';
        } else {
            document.getElementById(array[i].id + 'Error').innerHTML = '';
        }
    }
console.log(error)
    return error
}

// Fonction faisant l'appel
function fetchApi(table, data, header) {
    const URL = getApiTable(table)

    fetch(URL, header)
        .then((response) => {
            console.log(response);
            if(response.ok) {
                response.json().then((data) => {
                    location.reload();
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}

// les fonctions spécifiques aux tables

//CONSULTATION
function getApiConsultation(id, table) {

    if (id) {

        const URL = getApiView(id, table)

        fetch(URL, getHeaderGet())
            .then((response) => {
                if(response.ok) {
                    response.json().then((data) => {
                        let date = new Date(data['fields']['Date']);
                        let year = date.getFullYear();
                        let month = date.getMonth()+1;
                        let dt = date.getDate();
                        let hours = date.getUTCHours() ;
                        let minutes = date.getMinutes();

                        if (dt < 10) {
                            dt = '0' + dt;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }
                        if (hours < 10) {
                            hours = '0' + hours;
                        }
                        if (minutes < 10) {
                            minutes = '0' + minutes;
                        }
                        document.getElementById("consultationTitle").innerHTML = "Modifier la consultation du patient";
                        document.getElementById("consultationButton").textContent = "Modifier"
                        document.getElementById("consultationButton").className = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        document.getElementById("patientName").value = data['fields']['Patient'][0];
                        document.getElementById("doctorName").value = data['fields']['Doctor'][0];
                        document.getElementById("dateTime").value = year + "-" + month + "-" + dt;
                        document.getElementById("time").value = hours + ":" + minutes;
                        document.getElementById('consultationId').value = id;
                    })
                } else {
                    console.log(response);
                }
            }).catch((e) =>{
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

function validateConsultation(table) {
    let array = [
        document.getElementById('patientName'),
        document.getElementById('doctorName'),
        document.getElementById('dateTime'),
        document.getElementById('time'),
    ]
    let patient = document.getElementById('patientName').value;
    let docteur = document.getElementById('doctorName').value;
    let date = document.getElementById('dateTime').value;
    let time = document.getElementById('time').value;
    let id = document.getElementById('consultationId').value;

    if (0 < checkError(array)) {
        return;
    }

    let data = {};

    if (id !== '') {
        // update
        data = {
            'records': [
                {
                    'id': id,
                    'fields': {
                        'Patient': [patient],
                        'Doctor': [docteur],
                        'Date': date + "T" + time + ":00.000Z",
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
                    'fields': {
                        'Patient': [patient],
                        'Doctor': [docteur],
                        'Date': date + "T" + time + ":00.000Z",
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}


//JOB
function getApiJob(id, table) {
    const URL = getApiView(id, table)

    fetch(URL, getHeaderGet())
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    document.getElementById("jobName").value = data['fields']['Name'];
                    document.getElementById('jobId').value = id;
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}

function validationJob(table) {
    let array = [
        document.getElementById('jobName'),
    ]
    let name = document.getElementById('jobName').value;
    let id = document.getElementById('jobId').value;

    if (0 < checkError(array)) {
        return;
    }

    console.log(array);

    let data = {};

    if (id !== '') {
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
            'records': [
                {
                    'fields': {
                        'Name': name,
                        'Doctor': []
                    }
                }
            ]
        }
        fetchApi(table, data, getHeaderPost(data))
    }
}


// DOCTOR
function getApiDoctor(id, table) {
    const URL = getApiView(id, table)

    fetch(URL, getHeaderGet())
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    console.log(data);
                    document.getElementById("DoctorFirstname").value = data['fields']['Firstname'];
                    document.getElementById("DoctorLastname").value = data['fields']['Lastname'];
                    data['fields']['Jobs'].forEach(element =>
                        document.getElementById(element).checked = true
                    )

                    document.getElementById('DoctorId').value = id
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}

function updateDoctor(table) {
    let jobs = document.getElementsByClassName('job-checkbox');
    let id = document.getElementById('DoctorId').value;
    let firstname = document.getElementById('DoctorFirstname').value;
    let lastname = document.getElementById('DoctorLastname').value;
    let jobsUpdate = [];

    for (let i=0; i < jobs.length; i++)
    {
        if (jobs[i].checked) {
            jobsUpdate.push(jobs[i].id)
        }
    }

    const URL = getApiTable(table)
    const data = {
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

    fetch(URL, getHeaderPatch(data))
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    location.reload();
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}


//DISEASE
function getApiDisease(id, table) {
    const URL = getApiView(id, table)

    fetch(URL, getHeaderGet())
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    console.log(data);
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
}

function updateDisease(table) {
    let name = document.getElementById('DiseaseName').value;
    let description = document.getElementById('DiseaseDescription').value;
    let id = document.getElementById('DiseaseId').value;

    const URL = getApiTable(table)
    const data = {
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

    fetch(URL, getHeaderPatch(data))
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    location.reload();
                })
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}


//PATIENT
function getApiPatient(id, table) {
    const URL = getApiView(id, table)

    fetch(URL, getHeaderGet())
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    console.log(data);
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
}

function updatePatient(table) {
    let age = document.getElementById("PatientAge").value;
    let blood = document.getElementById("PatientBlood").value;
    let city = document.getElementById('PatientCity').value;
    let country = document.getElementById('PatientCountry').value;
    let email = document.getElementById('PatientEmail').value;
    let diseases = document.getElementsByClassName('patient-checkbox');
    let firstname = document.getElementById('PatientFirstname').value;
    let lastname = document.getElementById('PatientLastname').value ;
    let phone = document.getElementById('PatientPhone').value;
    let id = document.getElementById('PatientId').value;

    let diseasesUpdate = [];

    for (let i=0; i < diseases.length; i++)
    {
        if (diseases[i].checked) {
            diseasesUpdate.push(diseases[i].id)
        }
    }

    const URL = getApiTable(table)

    const data = {
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
}

function createPatient(table) {
    let array = [
        document.getElementById('CreatePatientAge'),
        document.getElementById('CreatePatientBlood'),
        document.getElementById('CreatePatientCity'),
        document.getElementById('CreatePatientCountry'),
        document.getElementById('CreatePatientEmail'),
        document.getElementById('CreatePatientFirstname'),
        document.getElementById('CreatePatientLastname'),
        document.getElementById('CreatePatientPhone'),
    ];

    let age = document.getElementById('CreatePatientAge').value;
    let blood = document.getElementById('CreatePatientBlood').value;
    let city = document.getElementById('CreatePatientCity').value;
    let country = document.getElementById('CreatePatientCountry').value;
    let email = document.getElementById('CreatePatientEmail').value;
    let firstname = document.getElementById('CreatePatientFirstname').value;
    let lastname = document.getElementById('CreatePatientLastname').value;
    let phone = document.getElementById('CreatePatientPhone').value;

    let error = 0;
    let diseases = document.getElementsByClassName('create-patient-checkbox');

    if (checkError(array) > 0 ) {
        return;
    }

    let diseasesCreate = [];

    for (let i=0; i < diseases.length; i++)
    {
        if (diseases[i].checked) {
            diseasesCreate.push(diseases[i].id)
        }
    }

    data = {
        // create
        'records': [
            {
                "fields": {
                    "Age": age,
                    "Blood_type": blood,
                    "City": city,
                    "Country": country,
                    "Diseases": diseasesCreate,
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


//delete
function deleteRow(table) {
    const id = document.getElementById("suppression").value;
    if(id != " ") {
        deleteApi(id, table)
    }
}

function deleteApi(id, table) {
    const API_KEY = "keyoVQjZ08H4oQBSO";
    const URL = `https://api.airtable.com/v0/appMxtIo1QNXAobOO/`  + table + `/` + id + `?api_key=${API_KEY}`;

    fetch(URL, getHeaderDelete())
        .then((response) => {
            console.log(response);
            if(response.ok) {
                location.reload();
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}

function confirmationDeleteConsultation(id) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML ="Êtes-vous sûr de vouloir supprimer cette consultation ?";
}

function confirmationDeleteJob(id, nomJob) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML ="Êtes-vous sûr de vouloir supprimer le métier " + nomJob + " ?";
}

function confirmationDeleteDoctor(id, nomDoctor) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML ="Êtes-vous sûr de vouloir supprimer le docteur " + nomDoctor + " ?";
}

function confirmationDeleteDisease(id, nomMaladie) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML ="Êtes-vous sûr de vouloir supprimer la maladie " + nomMaladie + " ?";
}

function confirmationDeletePatient(id, nomPatient) {
    document.getElementById("suppression").value = id;
    document.getElementById("message").innerHTML ="Êtes-vous sûr de vouloir supprimer le patient " + nomPatient + " ?";
}

