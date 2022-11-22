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
                .get("api/courses/search", {
                    headers: {
                        Authorization: 'Bearer ' + auth
                    },
                    params: {
                        name: search.toLowerCase()
                    }
                })
                .then((res) => {
                    var results = res.data
                    if(results.error){
                        console.log(results.error)
                        return
                    }
                    else {
                        if(results.message){
                            document.querySelector('#show').innerHTML = ''
                        }
                        else {
                            results.forEach((product) => {
                                document.querySelector('#show').innerHTML = `
                                    <div class="product">
                                        <img src="assets/uploads/courses/${product.image_course}" width="50px" height="50px" alt="">
                                        <div class="product-detail">
                                            <h4>${product.name_course.slice(0, 30)}</h4>
                                            <p>$${product.price_course}</p>
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
