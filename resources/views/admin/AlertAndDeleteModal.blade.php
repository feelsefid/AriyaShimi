<!-- Confirm Delete Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="float: left">&times;</button>
                <h3 class="modal-title">@lang('form.delete')</h3>
            </div>
            <div class="modal-body">
                <p>@lang('form.delete_description')</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="yes" class="btn btn-danger btn-sm" data-dismiss="modal">@lang('general.yes')</button>
                <button type="button" id="no" class="btn btn-default btn-sm" data-dismiss="modal">@lang('general.no')</button>
            </div>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="alertModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content panel-danger">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" style="float: left">&times;</button>
                <h3 class="modal-title">@lang('form.delete')</h3>
            </div>
            <div class="modal-body">
                <p>@lang('form.delete_description')</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="yes" class="btn btn-danger btn-sm" data-dismiss="modal">@lang('general.yes')</button>
                <button type="button" id="no" class="btn btn-default btn-sm" data-dismiss="modal">@lang('general.no')</button>
            </div>
        </div>
    </div>
</div>