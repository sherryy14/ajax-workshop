

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Form</title>
</head>
<body>
    
<h1 class="text-center">Country List</h1>

<div class="container my-3">
    <div class="row">
        <div class="col-5">
            <select  id="country" class="form-control">
                <?php 
                $conn = mysqli_connect('localhost','root','','countrylist');

                $country = "SELECT * FROM `countries`";
                $res = mysqli_query($conn,$country);
                while($row =  mysqli_fetch_array($res)){

                
                ?>
                <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>

                <?php 
                }
                ?>
            </select>
        </div>
        <div class="col-5">
            <select  id="city" class="form-control">
                
            </select>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){

        $('#country').change(function(){
            let countryID=$(this).val();

            $.ajax({
                url:"getcity.php",
                type: "POST",
                data : {countryID: countryID},
                success:function(data){
                    $('#city').html(data)
                }
            })
        })

    })
</script>

</body>
</html>