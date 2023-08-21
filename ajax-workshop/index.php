<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h1>Student Record App</h1>
    </div>

    <div class="container">
        <form id='form'>

            <div class="row">
                <div class="col-3">
                    <input type="text" class='form-control' placeholder="Enter Your Name" id="name">
            </div>
            <div class="col-3">
                <input type="text" class='form-control' placeholder="Enter Your Email" id="email">
                
            </div>
            <div class="col-3">
                <input type="text" class='form-control' placeholder="Enter Your Age" id="age">

            </div>
            <div class="col-3">
                <input type="text" class='form-control' placeholder="Enter Your City" id="city">

            </div>
            <input type="submit" value="Submit" class='btn btn-dark my-3' id="btn">
        </div>
    </form>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <input type="text" id='searchName'  class='form-control' placeholder="Search By Name" >
            </div>
            <div class="col-3">
                <select  id="sortAge" class="form-control">
                    <option selected disabled>Sort By Age</option>
                    <option value="ASC">Low to High</option>
                    <option value="DESC">High to Low</option>
                </select>
            </div>
            <div class="col-3">
                <select  id="filterCity" class="form-control">
                    <option selected disabled>Filter By City</option>
                 
                    <?php 
                    $connection = mysqli_connect('localhost','root','','workshop');
                    $fetch = "SELECT DISTINCT(city) FROM `ajax`";
                    $result = mysqli_query($connection, $fetch);
                    while($row = mysqli_fetch_assoc($result)){

                    ?>
                    <option value="<?php echo $row['city']?>"><?php echo $row['city']?></option>
                    <?php 
                    }
                    ?>

                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody id="data">
               
          
                
            </tbody>
        </table>
    </div>


    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function(){
            function fetch(){
                $.ajax({
                    url: 'fetch.php',
                    type: "POST",
                    success:function(studentData){
                        $('#data').html(studentData)
                    }

                })
            }

            fetch()

            $('#btn').click(function(e){
                e.preventDefault();

                let name = $('#name').val();
                let email = $('#email').val();
                let age = $('#age').val();
                let city = $('#city').val();

                $.ajax({
                    url: 'insert.php',
                    type: "POST",
                    data: {
                        username: name,
                        email : email,
                        age: age ,
                        city : city
                    }
                })

                $('#form').trigger('reset')


                fetch()


            })

            $("#searchName").keyup(function(){
                // let name =$("#searchName").val()
                let name =$(this).val()

                console.log(name);
                $.ajax({
                    url: "searchName.php",
                    type: "POST",
                    data: { name:name },
                    success: function(data){
                        $('#data').html(data)
                    }
                })
            })


            $('#sortAge').change(function(){
                let age =$(this).val()

            console.log(age);
                $.ajax({
                    url: "sortAge.php",
                    type: "POST",
                    data: { age:age },
                    success: function(data){
                        $('#data').html(data)
                    }
                })
            })


            
            $('#filterCity').change(function(){
                let city = $(this).val();

                $.ajax({
                    url: 'filterCity.php',
                    type: "POST",
                    data: {city : city},
                    success:function(data){
                        $('#data').html(data)
                    }
                })

            })


        })
    </script>
</body>
</html>