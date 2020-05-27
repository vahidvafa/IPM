<table>
    <thead>
    <tr>
        <th>ردیف</th>
        <th>نام</th>
        <th>تلفن همراه</th>
        <th>ایمیل</th>
        <th>جنسیت</th>
        <th>نام پدر</th>
        <th>کد ملی</th>
        <th>محل تولد</th>
        <th>تاریخ تولد</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
        <tr>
            <td>{{ ($loop->index + 1) }}</td>
            <td>{{ $user->first_name.' '.$user->last_name }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            @if(isset($user->profile[0]))
                <td>{{ ($user->profile[0]->sex == 1 ) ? 'مرد' : 'زن' }}</td>
                <td>{{ $user->profile[0]->father_name  }}</td>
                <td>{{ $user->profile[0]->national_code  }}</td>
                <td>{{ $user->profile[0]->birth_place  }}</td>
                <td>{{ $user->profile[0]->birth_date  }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
