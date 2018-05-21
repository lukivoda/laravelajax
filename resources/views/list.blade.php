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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-5 col-xs-12">
            <input type="text" class="form-control" name="searchItem" id="searchItem" placeholder="Search for...">
        </div><!-- /input-group -->


     <div class="col-sm-7 col-xs-12">
         <div class="panel panel-default">
             <div class="panel-heading">
                 <h3 class="panel-title">List of todos <a  id="addNew" data-toggle="modal" data-target="#myModal" class="pull-right" href=""><i class="fa fa-plus "> </i></a></h3>
             </div>
             <div class="panel-body">
                 <ul id="items" class="list-group">
                     @foreach($items as $item)

                     <li style="cursor: pointer;color: #768fa4" data-toggle="modal" data-target="#myModal" class="list-group-item ourItem">{{$item->item}}</li>
                     <input type="hidden" id="itemId" value="{{$item->id}}" >
                     @endforeach
                 </ul>
             </div>
         </div>
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
                            <input type="hidden" id="id">
                            {{csrf_field()}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style="display: none" id="deleteBtn"   type="button" class="btn btn-danger" data-dismiss="modal" >Delete</button>
                        <button style="display: none" id="saveBtn" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        <button type="button" id="addBtn" class="btn btn-success" data-dismiss="modal">Add item</button>
                    </div>
                </div>
            </div>
        </div>



</div>




<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
   $(document).ready(function(){
       //because we are using dynamically generated elements we need on() function on document model
      $(document).on('click',".ourItem",function(){
              var text = $(this).text();
              //getting id for the item from the hidden input next to item input
              var id = $(this).next("#itemId").val();
              $("#title").text("Edit item");
              $("#addItem").val(text);
              $("#saveBtn,#deleteBtn").show();
              $("#addBtn").hide();
              //setting the value of the hidden input placed in the modal
              $("#id").val(id);
          });


//because we are using dynamically generated elements we need on() function on document model
       $(document).on('click',"#addNew",function(){
           $("#title").text("Add new item");
           $("#addItem").val('');
           $("#saveBtn,#deleteBtn").hide();
           $("#addBtn").show();
       });


   // adding items
       $("#addBtn").click(function(){
           var text = $("#addItem").val();
           if(text  == ''){
               alert("Input field must be filled")
           }else{
               text = $.trim(text);
               $.post('list', {'text':text,'_token':$('input[name=_token]').val()} ,function (data) {
                   // $("#myModal").modal('toggle');
                   //refreshing only part of the page(specific id only)-use empty space in the string
                   $("#items").load(location.href+ " #items");
                   console.log(data);
               });
           }

       });

//deleting items
       $("#deleteBtn").click(function(){
           //getting the value from modal
         var id = $("#id").val();
           $.post('delete', {'id':id,'_token':$('input[name=_token]').val()} ,function (data) {
               // $("#myModal").modal('toggle');
               //refreshing only part of the page(specific id only)-use empty space in the string
               $("#items").load(location.href+ " #items");
               console.log(data);
           });

       });

  //saving items
     $("#saveBtn").click(function(){
         var id = $("#id").val();
         var text = $("#addItem").val();
         $.post('update', {'id':id,'text':text,'_token':$('input[name=_token]').val()} ,function (data) {
             // $("#myModal").modal('toggle');
             //refreshing only part of the page(specific id only)-use empty space in the string
             $("#items").load(location.href+ " #items");
             console.log(data);
         });
     });

       $( function() {
           $("#searchItem").autocomplete({
               source: "https://weblaravel.herokuapp.com/search"
           });
       });



   });
</script>
</body>
</html>   