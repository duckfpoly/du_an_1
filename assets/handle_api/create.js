var auth = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw';
function create(){
    const input = {
        'name_category': document.getElementById('name_category').value,
    }
    axios.post("api/categories", input , {
        headers: {
            'content-type': 'application/json',
            Authorization: 'Bearer ' + auth
        },
    })
    .then((res) => {
        console.log(res)
    })
    .catch((error) => {
        console.error(error);
    });
}
function read(){
    axios.get("api/categories", {
        headers: {
            Authorization: 'Bearer ' + auth
        },
    })
        .then((res) => {
            console.log(res.data)
        })
        .catch((error) => {
            console.error(error);
        });
}
function update(){
    const input = {
        'id': document.getElementById('id_category').value,
        'name_category': document.getElementById('name_category').value
    }
    axios.put("api/categories", input , {
        headers: {
            'content-type': 'application/json',
            Authorization: 'Bearer ' + auth
        },
    })
        .then((res) => {
            console.log(res)
        })
        .catch((error) => {
            console.error(error);
        });
}
function destroy(){
    const input = {
        'id': document.getElementById('id_category').value,
    }
    axios
        .delete("api/categories", {
            headers: {
                'content-type': 'application/json',
                Authorization: 'Bearer ' + auth
            },
            data: input
        })
        .then((res) => {
            console.log(res.data)
        })
        .catch((error) => {
            console.error(error);
        });
}
function search(){
    document.querySelector('#filter').addEventListener('input', (e) => filterData(e.target.value))
    function filterData(search) {
        axios
            .get("api/categories", {
                headers: {
                    Authorization: 'Bearer ' + auth
                },
                params: {
                    q: search.toLowerCase()
                }
            })
            .then((res) => {
                var results = res.data
                document.querySelector('#show').innerHTML = ""
                if(results.error){
                    console.log(results.error)
                }
                else {
                    if(results.message){
                        document.querySelector('#show').innerHTML = results.message
                    }
                    else {
                        results.forEach((items) => {
                            document.querySelector('#show').innerHTML += `
                                <div class="product">
                                    <div class="product-detail">
                                        <h4>${items.name_category}</h4>
                                    </div>
                                </div>
                               `
                        })
                    }
                }
            })
            .catch((error) => {
                console.error(error);
            });
    }
}
function detail(){
    axios
        .get("api/categories", {
            headers: {
                Authorization: 'Bearer ' + auth
            },
            params: {
                id: document.getElementById('id_category').value
            }
        })
        .then((res) => {
            console.clear()
            console.log(res.data)
        })
        .catch((error) => {
            console.error(error);
        });
}