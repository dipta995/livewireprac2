<div class='container'>
    @include('livewire.create')
    @include('livewire.update')
    <div class="card">
        <div class="card-header">
            <h3>Students</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstudentModal">
                Launch demo modal
              </button>
        </div>
    </div>
    @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


 


 


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">email</th>
            <th scope="col">Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>@php $i=0; @endphp
            @foreach ($students as $item)
            @php $i++; @endphp
            <tr>
              <th scope="row">{{ $i }}</th>
              <td>{{ $item->firstname }}</td>
              <td>{{ $item->lastname }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td> <button type="button" class="btn btn-primary" data-toggle="modal" wire:click.prevent='edit({{ $item->id }})' data-target="#updatestudentModal">
                Update
              </button>
            <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $item->id }})">Delete</button>
            </td>
            </tr>
          
                
            @endforeach
        </tbody>
      </table>
</div>
