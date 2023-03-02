<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <style>
        /* .qwer {
            display: none;
        } */
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div id="people_data_main">
                <div class="people_head">
                    <div class="people_txt">
                        <h2>people data</h2>
                    </div>
                    <div class="people_btn">
                        <button>next person</button>
                    </div>
                </div>
                <div class="people_wrap">
    
                </div>
            </div>
            
           
        </div>


        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js'></script>

        <script>
            $(document).ready(function () {
                $.getJSON('data.json', function (data) {
                    console.log(data);

                    var newDiv = '';
                    var c = 0;
                    $.each(data, function (key, value) {
                        var key_incr = ++c;
                        newDiv += "<div class='list_wrap'>" +
                            "<div class='list_L'>" + key_incr + "</div>" +
                            "<div class='list_R'><div class='list_name'><p><b>name:</b>" +
                            value.name + "</p></div>" +
                            "<div class='list_location'><p><b>location:</b>" +
                            value.location + "</p></div>" +
                            "</div></div>";

                    });

                    $(".people_wrap").append(newDiv);

                    var items = $(".people_wrap .list_wrap");
                    //alert(items);
                    var numItems = items.length;
                    var perPage = 3;

                    items.slice(perPage).hide();

                    $('.people_btn').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: "&laquo;",
                        nextText: "next person",
                        onPageClick: function (pageNumber) {
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });


                });



            });
        </script>
        
        <!-- <script src="script.js"></script> -->
        <!-- <script>
        $(document).ready(function () {
            //alert('hi');
       
    });
    </script> -->
</body>

</html>