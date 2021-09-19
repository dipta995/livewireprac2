<div class='container'>
    {{-- @include('livewire.create')
    @include('livewire.update') --}}
    <div class="card">
        <div class="card-header">
            <h3>Students</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcatModal">
                Add New Catagory
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
            <th scope="col">cat name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>@php $i=0; @endphp
            @foreach ($cats as $item)
            @php $i++; @endphp
            <tr>
              <th scope="row">{{ $i }}</th>
              <td>{{ $item->cat_name }}</td>
              <td> <button type="button" class="btn btn-primary" data-toggle="modal" wire:click.prevent='edit({{ $item->id }})' data-target="#updatecatModal">
                Update
              </button>
            <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $item->id }})">Delete</button>
            </td>
            </tr>
          
                
            @endforeach
        </tbody>
      </table>
{{-- update  --}}
      <div wire:ignore.self class="modal fade" id="updatecatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id" wire:model="ids">
                    <input type="text"  wire:model.lazy='cat_name' name="cat_name">
                    @error('cat_name') <span class="text-danger">{{ $message }}</span> @enderror
                        
                
                     
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent='update()'>Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- Create --}}

      <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addcatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <input type="text" placeholder="cat Name" wire:model.lazy='cat_name' name="cat_name">
                 
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent='store()'>Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
