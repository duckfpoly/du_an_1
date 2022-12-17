<button onclick="updatePasswordStudent(3,123456,654321)">Update</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.0/axios.min.js"></script>
<script>
    function updatePasswordStudent(idStudent,oldPass,newPass){
        axios
            .get("api/students", {
                params: {
                    id: idStudent,
                    new_pass: oldPass,
                    old_pass: newPass
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
</script>