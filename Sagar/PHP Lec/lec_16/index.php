<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <select name="" id="" onchange="change(this.value)">
        <option value="" selected disabled>-select-</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="Brazil">Brazil</option>
    </select>

    <!-- city -->
    <select name="" id="city">
        <option value="" selected disabled>--selected--</option>
    </select>

    <script>
       function change(country){
            if(country)
            {
                $.ajax({

                    url : 'manage.php',
                    type : 'POST',
                    data : {
                        action : country,
                    },
                    success : function(res)
                    {
                        // var option = "<option value=selected disabled>--selected--</option>";
                        console.log(res);
                        for (let i=0; i<res.lengthl; i++)
                        {
                            console.log(res[i]);
                        }
                        // for (let i = 0; i < res.length; i++)
                        // {
                        //     option += "<option value='" + res[i] + "'>" + res[i] + "</option>";
                        // }
                        // $("#city").html(option);
                    }
                })
            }
       }
    </script>

</body>
</html>
