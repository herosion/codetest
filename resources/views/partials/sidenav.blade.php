<div class="section">
    <div class="row">
        <div class="col m12 s8 offset-s4">
            <h5>Hello {{  $admin->username }}</h5>
        </div>
        <div class="col m12 s8 offset-s4">
            <img src="{{url('images/admin.png')}}">
        </div>
        <div class="col m12 s8 offset-s4">
            <i class="material-icons">grade</i><i class="material-icons">grade</i><i class="material-icons">grade</i><i class="material-icons">grade</i>
        </div>
        <div class="col m12 s12"> 
            <p class="left-align" class="col s12">Total des questions : {{ $nbQuestion->count() }}</p>
        </div>
    </div>
</div>

<!-- <div class="divider">
</div> -->

<!-- <div class="section">
    <div class="row">
        <div class="col m12 s6 offset-s1 ">
            <span> Add question </span><a class="btn-floating btn waves-effect waves-light #42a5f5 blue lighten-1" href="{{ route('admin.create')}}"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>
 -->