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

function modifierConsultation(table) {
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

function modifierJob(table) {
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

function modifierDoctor(table) {
    let jobs = document.getElementsByClassName('job-checkbox');
    let id = document.getElementById('DoctorId').value;
    let firstname = document.getElementById('DoctorFirstname').value;
    let lastname = document.getElementById('DoctorLastname').value;
    let jobsUpdate = [];

    for (i=0; i < jobs.length; i++)
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
