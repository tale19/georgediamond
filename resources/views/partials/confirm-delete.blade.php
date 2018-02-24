@auth
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm delete</h5>
                </div>
                <div class="modal-body">
                    <div>Are you sure you want to delete the post <strong><span id="delete-title"></span></strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="deletePost" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete post</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endauth