const API_KEY = "keyoVQjZ08H4oQBSO"

function getApiView(id, table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `/` + id + `?api_key=${API_KEY}`
}
function getApiTable(table) {
    return `https://api.airtable.com/v0/appMxtIo1QNXAobOO/` + table + `?api_key=${API_KEY}`
}

function getApiConsultation(id, table) {
    const URL = getApiView(id, table)

    const header = {
        method: 'GET',
        headers: { 'Content-Type': 'application/json'},
    }
    fetch(URL, header)
        .then((response) => {
            if(response.ok) {
                response.json().then((data) => {
                    date = new Date(data['fields']['Date']);
                    year = date.getFullYear();
                    month = date.getMonth()+1;
                    dt = date.getDate();
                    hours = date.getUTCHours() ;
                    minutes = date.getMinutes();

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
    patient = document.getElementById('patientName').value;
    docteur = document.getElementById('doctorName').value;
    date = document.getElementById('dateTime').value;
    time = document.getElementById('time').value;
    id = document.getElementById('consultationId').value;

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

    const header = {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }
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

function getApiJob(id, table) {
    const URL = getApiView(id, table)

    const header = {
        method: 'GET',
        headers: { 'Content-Type': 'application/json'},
    }
    fetch(URL, header)
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
    name = document.getElementById('jobName').value;
    id = document.getElementById('jobId').value;

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

    const header = {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }
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

