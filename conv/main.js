$("#conv").submit(function(e){

    let num = new FormData ($("#conv").get(0));

    e.preventDefault();

    $.ajax ({

        type: "post", 
        contentType: false,
        dataType: false,
        processData: false,
        url: "api.php",
        data: num,

        success:function (response){
            console.log("Respuesta");
            console.log(response);
            console.log(num);
            $("#res").html(response);
        }

    });

 });



