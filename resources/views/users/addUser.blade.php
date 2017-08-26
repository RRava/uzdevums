

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>

                    {{csrf_field()}}
                    <input class="form-control mr-md-1" type="text" placeholder="name" aria-label="name" name="name" id="userName">
                    <div id="errorName" class="alert-danger">please enter name</div>

                    <input class="form-control mr-md-1" type="text" placeholder="surname" aria-label="surname" name="surname" id="userSurname">
                    <div id="errorSurname" class="alert-danger">please enter last name</div>

                    <input class="form-control mr-md-1" type="number" min="0" step="1" placeholder="age" aria-label="age" name="age" id="userAge">
                    <div id="errorAge" class="alert-danger">please enter age</div>

                    <input class="form-control mr-md-1" type="email" placeholder="email@exemple.com" aria-label="email" name="email" id="userEmail">
                    <div id="errorEmail" class="alert-danger">please enter email</div>

                    <button type="button" class="btn btn-dark" id="saveUser"  >Save</button>
                    <button type="button" class="btn btn-dark" id="updateUser" >Update</button>
                    <button type="button" class="btn btn-danger" id="deleteUser">Delete</button>


                </form>
            </div>
        </div>
    </div>
</div>