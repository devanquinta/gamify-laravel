<div class="visible-md visible-lg hidden-sm hidden-xs">
    <a href="{{ route('admin.' . $model . '.show', $id) }}" class="btn btn-xs btn-teal tooltips"
       data-placement="top" data-original-title="{{ trans('general.show') }}"><i class="fa fa-eye"></i></a>
    <a href="{{ route('admin.' . $model . '.edit', $id) }}" class="btn btn-xs btn-green tooltips"
       data-placement="top" data-original-title="{{ trans('general.edit') }}"><i class="fa fa-edit"></i></a>
    <a href="{{ route('admin.' . $model . '.delete', $id) }}" class="btn btn-xs btn-bricky tooltips"
       data-placement="top" data-original-title="{{ trans('general.delete') }}"><i class="fa fa-trash-o"></i></a>
</div>