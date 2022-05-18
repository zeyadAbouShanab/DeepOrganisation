@foreach($employees as $employee)
 <ul>
  <li>{{$employee->name}}</li>
  @if(count($employee->employees))
    @include('users.employeesList',['employees' => $employee->employees])
  @endif
 </ul> 
@endforeach
