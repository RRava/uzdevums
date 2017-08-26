$(document).ready(function(){

    var userID;
    var count;
    var errors = {
        "name": $('#errorName'),
        "surname": $('#errorSurname'),
        "age": $('#errorAge'),
        "email": $('#errorEmail')
    };



    //Modal preparing for user editing
    $(document).on("click",'.editUser', function() {

        $('#modalLabel').text("Edit User");
        $('#userModal').modal('show');
        $('#saveUser').hide();
        $('#updateUser').show();
        $('#deleteUser').show();
        userID = this.id.substring(6);

        for (var error in errors) {
            errors[error].hide();
        }

        $.ajax({
            url:'/edit',
            type:'post',
            data: {
                'id': userID,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {

                $('#userName').val(data.name);
                $('#userSurname').val(data.surname);
                $('#userAge').val(data.age);
                $('#userEmail').val(data.email)

            }
        })
    });


    //user editing and saving
    $(document).on("click",'#updateUser', function(){
        var inputs = {
            "name": $('#userName').val(),
            "surname": $('#userSurname').val(),
            "age": $('#userAge').val(),
            "email": $('#userEmail').val()
        };

        var error= false;

        for (var input in inputs) {
            if(inputs[input]===""){
                error = true;
                errors[input].show();
            }
            else errors[input].hide();
        }

        if(!isEmail(inputs.email)){
            error = true;
            errors.email.show();
        }

        if(!error) {

            $.post('/update', {
                    'name': inputs.name,
                    'surname': inputs.surname,
                    'age': inputs.age,
                    'email': inputs.email,
                    'id': userID,
                    '_token': $('input[name=_token]').val()
                },

                function (data) {
                    $('#userModal').modal('hide');
                    refreshTable();
                });
        }
    });


    //modal preparing for new user creation
    $(document).on("click",'#newUser',function () {

        $('#userModal').modal('show');

        $('#modalLabel').text('Add New User');
        $('#saveUser').show();
        $('#updateUser').hide();
        $('#deleteUser').hide();

        $('#userName').val("");
        $('#userSurname').val("");
        $('#userAge').val("");
        $('#userEmail').val("");

        for (var error in errors) {
            errors[error].hide();
        }

    });

    //new user saving
    $(document).on("click",'#saveUser',function () {

        var inputs = {
            "name": $('#userName').val(),
            "surname": $('#userSurname').val(),
            "age": $('#userAge').val(),
            "email": $('#userEmail').val()
        };

        var error= false;

        for (var input in inputs) {
            if(inputs[input]===""){
                error = true;
                errors[input].show();
            }
            else errors[input].hide();
        }

        if(!isEmail(inputs.email)){
            error = true;
            errors.email.show();
        }

        if(!error) {
            $.post('/store', {
                    'name': inputs.name,
                    'surname': inputs.surname,
                    'age': inputs.age,
                    'email': inputs.email,
                    '_token': $('input[name=_token]').val()
                },

                function (data) {

                    $('#userModal').modal('hide');
                    $('#usersCount').attr("placeholder", "0 - " + data);
                    $('#usersCount').attr("max", parseInt(data));

                });
        }
    });

    //user deleting
    $(document).on("click",'#deleteUser',function () {

        $.ajax({
            url: '/',
            type: 'post',
            data: {_method: 'delete', 'id': userID, '_token': $('input[name=_token]').val() },
            success: function (data)
            {
                count = count - 1;
                $('#usersCount').attr("placeholder", "0 - " + count);
                $('#usersCount').attr("max", count);
                $('#usersCount').val("");
                $('#userModal').modal('hide');
                refreshTable();
            }
        });



    });

    //user selecting
    $(document).on("click", '#showUsers', function () {

        count = $('#usersCount').val();

        if(count>parseInt($('#usersCount').attr("max"))){
            count = $('#usersCount').attr("max");
            $('#usersCount').val(count);
        }

        if(count<0){
            count = 0;
            $('#usersCount').val(count);

        }

        if(count!=="") refreshTable();


    });


    function refreshTable() {
        $.ajax({
            url:'/show',
            type:'post',
            data: {
                'count': count,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                $("#show").html(data);
            }
        });
    }


    function isEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

});

