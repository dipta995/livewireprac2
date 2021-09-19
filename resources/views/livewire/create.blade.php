<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addstudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" placeholder="First Name" wire:model.lazy='firstname' name="firstname">
                <input type="text" placeholder="Last Name"  wire:model.lazy='lastname' name="lastname">
                <input type="email" placeholder="Email"  wire:model.lazy='email' name="email">
                <input type="text" placeholder="Phone No"  wire:model.lazy='phone' name="phone">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent='store()'>Save</button>
        </div>
      </div>
    </div>
  </div>