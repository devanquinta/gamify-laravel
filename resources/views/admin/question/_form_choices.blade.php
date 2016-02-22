<!-- choices -->
@if (count($question->choices) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>
        {{ trans('admin/choice/title.current_choices') }}
    </div><!-- ./ panel-header -->
    <div class="panel-body">
        <p>
            <a href="{{ route('admin.questions.choices.create', $question) }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{ trans('admin/choice/title.create_new') }}
            </a>
        </p>
        <table class="table table-hover">
            <tr>
                <th>{{ trans('admin/choice/table.text') }}</th>
                <th>{{ trans('admin/choice/table.points') }}</th>
                <th>{{ trans('admin/choice/table.correct') }}</th>
                <th>{{ trans('admin/choice/table.actions') }}</th>
            </tr>
            @foreach ($question->choices as $choice)
            <tr>
                <td>{{ $choice->text }}</td>
                <td>{{ $choice->points }}</td>
                <td>{{ $choice->correct ? trans('general.yes') : trans('general.no') }}</td>
                <td>
                    <a href="{{ route('admin.questions.choices.edit', array($question, $choice)) }}" rel="nofollow">
                        <button type="button" class="btn btn-xs btn-primary"
                                data-toggle="tooltip" data-placement="top" title="{{ trans('general.edit') }}"><i
                                    class="fa fa-edit"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin.questions.choices.destroy', array($question, $choice)) }}" rel="nofollow"
                       data-method="delete" data-confirm="{{ trans('admin/choice/messages.confirm_delete') }}">
                        <button type="button" class="btn btn-xs btn-danger"
                                data-toggle="tooltip" data-placement="top" title="{{ trans('general.delete') }}"><i
                                    class="fa fa-times fa fa-white"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@else
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>
        {{ trans('admin/choice/title.current_choices') }}
    </div><!-- ./ panel-header -->
    <div class="panel-body">
        <div class="alert alert-block alert-danger">
            <h4 class="alert-heading"><i class="fa fa-times-circle"></i> {{ trans('admin/choice/title.not_enough_choices') }}</h4>
            <p>{{ trans('admin/choice/messages.add_more_choices') }}</p>
            <p>
                <a href="{{ route('admin.questions.choices.create', $question) }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('admin/choice/title.create_new') }}
                </a>
            </p>
        </div>
    </div>
</div>
@endif
<!-- ./ choices -->