<div class="conteiner" style="background-color: #ddd;">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="east-fruit/edit/{{ $user->id }}" class="btn btn-xs btn-primary" title="" data-toggle="tooltip" data-original-title="Редактировать">
                        <i class="fa fa-pencil"></i>
                    </a>

                    {{--<a href="http://east-fruit/admin/users/44/edit" class="btn btn-xs btn-danger btn-delete" title="" data-toggle="tooltip" data-original-title="Удалить">--}}
                        {{--<i class="fa fa-trash"></i>--}}
                    {{--</a>--}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>