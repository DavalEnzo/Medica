const API_KEY = "keyoVQjZ08H4oQBSO"

function getHeaderPatch(data) {
    return {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }
}
function getHeaderGet(data) {
    return {
        method: 'GET',
        headers: { 'Content-Type': 'application/json'},
    }
}

function getApiView(id, table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `/` + id + `?api_key=${API_KEY}`
}
function getApiTable(table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `?api_key=${API_KEY}`
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
                location.reload();
            } else {
                console.log(response);
            }
        }).catch((e) =>{
        console.log(e)
    })
}

function getApiConsultation(id, table) {
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
}

function updateConsultation(table) {
    let patient = document.getElementById('patientName').value;
    let docteur = document.getElementById('doctorName').value;
    let date = document.getElementById('dateTime').value;
    let time = document.getElementById('time').value;
    let id = document.getElementById('consultationId').value;

    const URL = getApiTable(table)
    const data = {
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

    fetch(URL, getHeaderPatch(data))
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

function updateJob(table) {
    let name = document.getElementById('jobName').value;
    let id = document.getElementById('jobId').value;

    const URL = getApiTable(table)
    const data = {
        'records': [
            {
                'id': id,
                'fields': {
                    'Name': name,
                }
            }
        ]
    }

    fetch(URL, getHeaderPatch(data))
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
    console.log(URL)
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

function confirmationDelete(id, nomPatient) {
    document.getElementById("suppression").value = id;
    document.getElementById("nomPatient").innerHTML ="Êtes-vous sûr de vouloir supprimer le patient " + nomPatient + " ?";
}
