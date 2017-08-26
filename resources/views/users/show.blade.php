

    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->email}}</td>
            <td>
                <button type="button" class="btn-sm btn-dark editUser" id="userID{{$user->id}}" data-toggle="modal" data-target="#exampleModal">
                    edit
                </button>
            </td>
        </tr>
    @endforeach



