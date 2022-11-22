document.querySelector('#filter').addEventListener('input', (e) => filterData(e.target.value))
function filterData(search) {
    axios
        .get("api/courses/search", {
            params: {
                name: search.toLowerCase()
            }
        })
        .then((res) => {
            var results = res.data
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
        })
        .catch((error) => {
            console.error(error);
        });
}