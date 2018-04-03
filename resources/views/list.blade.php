<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax todo list</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6">
         <div class="panel panel-default">
             <div class="panel-heading">
                 <h3 class="panel-title">List of todos <a  id="addNew" data-toggle="modal" data-target="#myModal" class="pull-right" href=""><i class="fa fa-plus "> </i></a></h3>
             </div>
             <div class="panel-body">
                 <ul class="list-group">
                     <li data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">Cras justo odio</li>
                     <li data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">Dapibus ac facilisis in</li>
                     <li data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">Morbi leo risus</li>
                     <li data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">Porta ac consectetur ac</li>
                     <li data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">Vestibulum at eros</li>
                 </ul>
             </div>
         </div>
     </div>

        <!--  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="title" id="myModalLabel">Add new item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="addItem" name="addItem" class="form-control" placeholder="Write item here">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style="display: none" id="deleteBtn"   type="button" class="btn btn-danger" >Delete</button>
                        <button style="display: none" id="saveBtn" type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" id="addBtn" class="btn btn-success">Add item</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
    $(".ourItem").each(function(){
      $(this).on("click",function(event){
          var text = $(this).text();
          $("#title").text("Edit item");
         $("#addItem").val(text);
         $("#saveBtn,#deleteBtn").show();
         $("#addBtn").hide();
      });
    });

       $("#addNew").on("click",function(event){
               $("#title").text("Add new item");
               $("#addItem").val('');
               $("#saveBtn,#deleteBtn").hide();
               $("#addBtn").show();
           });


   });
</script>
</body>
</html>   