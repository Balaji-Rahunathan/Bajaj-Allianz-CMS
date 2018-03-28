<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <head>

    </head>

    <body>

    
<a style='text-decoration:none' href='#' data-toggle="modal" data-target="#myModal">
    <div class='addPolicy'>

        <br>
        <br>
        <br>
        
            <div>
                <img src='../assets/images/addPolicy.svg' width='50px'>
                <h4>Add Policy</h4>
            </div>
        
        
    </div>
    </a>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Policy</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="POST" action='../SampleSelector.php?select=PostNewTarget' enctype="multipart/form-data">
                            <label for='pName'>Policy Name</label> 
                            <input type='text' name='pName' placeholder="Policy Name">
                            <h4>Upload policy for image target generation</h4>
                        <div class='drop'>
                            <h4>Drop files here or click to upload</h4>
                            <p>Supported file types:".jpg" or non transparent ".png"
                            <br>Maximum size of 2 MB</p>   
                            <div class='clickHere'>                    
                                <input  type="file" id="a" name="picture" accept="image/jpeg*" />
                            </div>
                        </div>
                        <div class='submit'>
                            <input type="submit" class="btn btn-default"  value='Upload'>
                        </div>
                    </form>
                    
                </div>

            </div>

        </div>
    </div>


</body>