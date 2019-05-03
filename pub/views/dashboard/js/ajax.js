$(
    function () {


        $.get('Dashboard/XhrGetList', function (t) {
            var text = t.split("]");
            text[0]+=']';
            var obj = JSON.parse(text[0]);
            $("#InsertMsg").append('<div class="list1"> User List </div>');
            for (var i = 1; i < obj.length; i++) {

                $("#InsertMsg").append('<div class="list1">'+obj[i].user+'<a  rel="'+obj[i].id+'" class="del">X</a></div>');
            }

            $('.del').click( function () {
                var id = $(this).attr('rel');
                $.post('Dashboard/XhrDelList', {'id': id}, function (tt) {

                });
                window.location.replace('Dashboard');
                return false;
            });
        });

        $('#randomInsert').submit(function () {

            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.post(url, data, function (tt) {

            });
            window.location.replace('Dashboard');
            return false;
        });


    }
);