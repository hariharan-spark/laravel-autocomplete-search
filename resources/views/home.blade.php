<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 Ajax Autocomplete Search from Database Example - NiceSnippets.com</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 500px;
        }
        h2 {
            color: white;
        }
    </style>
</head>
<body class="bg-primary">
   {{-- <div class="container mt-5">
        <h2>Laravel AJAX Autocomplete Search with Select2</h2>
        <select class="livesearch form-control" name="livesearch"></select>
    </div> --}}
   {{-- <div class="container mt-4">

    <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
       @csrf
 
        <div class="form-group">
          <label for="exampleInputEmail1">Search Product By Name</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>
 
      </form>
      </form>--}}


      <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h5>Ajax Autocomplete Search from Database</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                                </div>
                                <ul id="product_list"></ul>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

</body>
<script type="text/javascript">
    // $('.livesearch').select2({
    //     placeholder: 'Select movie',
    //     ajax: {
    //         url: '/ajax-autocomplete-search',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         text: item.name,
    //                         id: item.id
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true
    //     }
    // });
// $(document).ready(function() {
//     $( "#name" ).autocomplete({
  
//         source: function(request, response) {
//             $.ajax({
//             url: '/ajax-autocomplete-search',
//             data: {
//                     term : request.term
//              },
//             dataType: "json",
//             success: function(data){
//                var resp = $.map(data,function(obj){
//                     return obj.name;
//                }); 
  
//                response(resp);
//             }
//         });
//     },
//     minLength: 2
//  });
// });



$(document).ready(function(){
            $('#name').on('keyup',function () {
                var query = $(this).val();
                $('#product_list').html("");
                if(query){
                $.ajax({
                    url: '/ajax-autocomplete-search',
                    type:'GET',
                    data:{'name':query},
                    success:function (response) {
                        $.each( response, function( key, value ) {
                    
                            $('#product_list').append('<li class="list-group-item">'+value.name+'</li>')
                            });
                        }
                    
                })
            }
            });
            $(document).on('click', 'li', function(){
                var value = $(this).text();
                $('#name').val(value);
                $('#product_list').html("");
            });
        });





</script>
</html>