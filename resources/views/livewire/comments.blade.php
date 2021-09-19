<div class="container" style="margin:0 auto;">
    <form  wire:submit.prevent="addcm">  
  <div class="form-group">
        <label for="exampleInputEmail1">Comment</label>
        <input wire:model.lazy="newComment" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <button class="btn btn-success" type="submit"> Add</button>
      </div>
    </form>
      <div class="card">
        @foreach ($comments as $comment)
            
        <div class="card-body">
          <h5 class="card-title">{{ $comment['creator'] }}</h5>
          <h3>{{ $comment['created_at'] }}</h3>
          <p class="card-text">{{ $comment['body'] }}</p>
           
        </div>
        @endforeach
   
      </div>
</div>