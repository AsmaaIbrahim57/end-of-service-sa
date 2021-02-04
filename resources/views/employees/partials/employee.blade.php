<tr>
    <th scope="row">{{$employee->id}}</th>

    <td>
        {{$employee->name}}
    </td>
    <td>
        {{$employee->gender}}
    </td>
    <td>
        {{$employee->work_years}}
    </td>
    <td>
        {{$employee->salary}}
    </td>
    <td>
        {{$employee->status}}
    </td>
    <td>
        <a  class="" href="{{route('end-service',$employee->id)}}">End Service</a>
    </td>
</tr>

