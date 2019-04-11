$(document).ready(function () {



    $('#country1').change(function () {

        var perPage = $(this).val();



        $.ajax({

           url: baseURl + '/ajax/perPage',

            data:{

               perPage : perPage

            },

            success : function (data) {

                $('.agile_top_brands_grids').html(data);

                $('#ajax').hide();

                $('.agile_top_brands_grids').show();

            }

        });

    });



    $('#country').change(function () {

        var sort = $(this).val();



        $.ajax({

            url: baseURl + '/ajax/sort',

            data:{

                sort : sort

            },

            success : function (data) {

                $('.agile_top_brands_grids').html(data);

                $('#ajax').hide();

                $('.agile_top_brands_grids').show();

            }

        });

    });

    

    $('.rate').click(function () {

        var rate = $(this).val();

        var product =  window.location.href.toString().split('/')[6];

        var user = $('.user').val();



        $.ajax({

           url: baseURl + '/ajax/rate',

            data:{

               rate: rate,

                product: product,

                user: user

            },

            success: function (data) {

                $('#alert').html(data);

                $('#alert').addClass('alert alert-success');

            }

        });

    });



    $('.search').click(function () {

        var param = $('input[name="Search"]').val();



        $.ajax({

            url: baseURl + '/ajax/search',

            data:{

                param: param

            },

            success: function (data) {

                $('#ajax').html(data);

                $('.agile_top_brands_grids').hide();

                $('#page').hide();

                $('.newproducts-w3agile h3:first').text('Rezultati pretrage');

                $('#ajax').show();

            }

        });

    });



    var total = 0;



    $('.price').each(function () {

        total += parseInt($(this).text());

    });



    total += " RSD";

    $('.total').html(total);



    $('.cartSearch').click(function () {

        var user = $('#user option:selected').val();



        $.ajax({

            url: baseURL + '/ajax/cart',

            data: {

                user : user

            },

            success : function(data){

                $('#mainTable').html(data);

            }

        });

    });



    $('#ddlAction').change(function(){

       var action = $('#ddlAction option:selected').val();



       $.ajax({

          url: baseURl + '/ajax/action',

          data:{

              action: action

          },

           success:function (data) {

               $('.agile_top_brands_grids').html(data);

               $('#ajax').hide();

               $('.agile_top_brands_grids').show();

           }

       });

    });



    // $('.pagination a').click(

    //     function(e){

       

    //         e.preventDefault();

    

    //         var url = $(this).attr('href');

    //         var page = url.split('page=')[1];

            

    

    //         $.ajax({

    //             url: baseURl + '/pagination?page=' + page,

    //         }).done(function(data){

    //             $('.agile_top_brands_grids').html(data);

    //         });

    //     }

    // ); 




});

