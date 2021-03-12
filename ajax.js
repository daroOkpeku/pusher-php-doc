$(document).ready(function () {
    $("#send").click(function (e) {
        e.preventDefault();
        $("#word").keyup(function () {
            var doc = $("#word").val()
            if (doc.length > 0) {
                console.log(doc)
            }

        })
    })
})
$.ajax({
    method: "GET",
    url: "user_config.php",
    data: "data",
    dataType: "JSON",
    success: function (data) {
        console.log(data)
    }

})
$(document).ready(function () {
    $.ajax({
        method: "GET",
        url: "display.php",
        data: "data",
        dataType: "JSON",
        success: function (response) {
            var output = ``;
            response.map((item) => {
                var { email, name, login, phoneNumber } = item
                output = `
         <aside class="inside">
         <p>
         <a href='process.php?name=${name}'><h2>${name}</h2></a>
         <h2>${email}</h2>
         <h2>${login}</h2>
           <h2> ${phoneNumber}</h2>
           </p>


       </aside>
        `;

                $("#dog").append(output)
            })
        }
    });
})
fetch('user_config.php').then(res => res.json()
).then(Response => {
    console.log(Response)
})