<table>
    <thead>
    <tr>
        <th>ردیف</th>
        <th>یانکرو</th>
        <th>تاریخ انقضا عضویت</th>
        <th>كد عضویت</th>
        <th>نوع عضويت</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>تلفن همراه</th>
        <th>ایمیل</th>
        <th>کد ملی</th>
        <th>تاریخ تولد(سال)</th>
        <th>تاریخ تولد(ماه)</th>
        <th>تاریخ تولد(روز)</th>
        <th>جنسیت</th>
        <th>محل تولد</th>
        <th>نام پدر</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
        <tr>
            <td>{{ ($loop->index + 1) }}</td>
            <td> {{count($user->profile) == 0?$user->id:(((jdate()->getYear() - (int)explode('/',$user->profile[0]->birth_date)[0]) <= 35)?"yes":"")}}</td>
            <td>{{jdate($user->expire)->format('Y/m/d')}}</td>
            <td>{{ preg_match("/\d{2,}-\d{3,}-[A-Z]/",$user->user_code)?substr($user->user_code,0,strlen($user->user_code)-2):$user->user_code}}</td>
            <td>{{ preg_match("/\d{2,}-\d{3,}-[A-Z]/",$user->user_code)?explode('-',$user->user_code)[2]:" "}}</td>
            <td>{{ $user->first_name}}</td>
            <td>{{ $user->last_name }}</td>
            <td>'{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            @if(isset($user->profile[0]))
                <td>'{{ $user->profile[0]->national_code  }}</td>
                <td>{{ explode('/',$user->profile[0]->birth_date )[0] }}</td>
                <td>{{ explode('/',$user->profile[0]->birth_date )[1]??"" }}</td>
                <td>{{ explode('/',$user->profile[0]->birth_date )[2]??"" }}</td>
                <td>{{ ($user->profile[0]->sex == 1 ) ? 'مرد' : 'زن' }}</td>
                <td>{{ $user->profile[0]->birth_place  }}</td>
                <td>{{ $user->profile[0]->father_name  }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
