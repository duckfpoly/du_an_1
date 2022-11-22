    <header>
        <h4 class="title">Live Product Filter</h4>
        <div class="form-input">
            <i class="fas fa-search"></i>
            <input
                type="text"
                id="filter"
                placeholder="Tìm sản phẩm mong muốn..."
            />
        </div>
    </header>
    <div class="products" id="show">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelector('#filter').addEventListener('input', (e) => filterData(e.target.value))
        var auth = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTmd1eWVuIER1YyIsInBob25lIjoiMDgyMzU2NTgzMSIsImVtYWlsIjoibmd1eWVuZHVjMTA2MDNAZ21haWwuY29tIiwiYWRtaW4iOnRydWUsImV4cCI6MTY2OTgwNTQ4Nn0.PByr6NO_lYgDSnT-KkW0bLBgsNzfIySHO_IofdxiHsw';
        function filterData(search) {
            axios
                .get("api/courses", {
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
                                            <h4>${items.name_course}</h4>
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
    </script>


