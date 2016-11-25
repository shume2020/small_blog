<h3>Recievied message from</h3>


<p>
    Name: {{$name}}
    {{Auth::user()->name}}


</p>
<p>
    Email:{{$from}}
     and {{Auth::user()->email}}

</p>
<p>

    Subject:{{$subject}}

</p>
<p>


    {{$body}}

</p>